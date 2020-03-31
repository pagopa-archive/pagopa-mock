# Create an App Service Plan with Linux
resource "azurerm_app_service_plan" "app_service_plan" {
  name                = "plan-pagopa-mock"
  location            = azurerm_resource_group.resource_group.location
  resource_group_name = azurerm_resource_group.resource_group.name

  # Define Linux as Host OS
  kind     = "Linux"
  reserved = true # Mandatory for Linux plans

  # Choose size
  sku {
    tier = "Standard"
    size = "S1"
  }

  tags = var.tags
}

# Create an Azure Web App for Containers in that App Service Plan
resource "azurerm_app_service" "app_service" {
  name                = "app-pagopa-mock"
  location            = azurerm_resource_group.resource_group.location
  resource_group_name = azurerm_resource_group.resource_group.name
  app_service_plan_id = azurerm_app_service_plan.app_service_plan.id
  https_only          = true

  # Do not attach Storage by default
  app_settings = {
    WEBSITES_ENABLE_APP_SERVICE_STORAGE = false
    WEBSITES_PORT                       = 80
    
    DOCKER_REGISTRY_SERVER_URL      = azurerm_container_registry.container_registry.login_server
    DOCKER_REGISTRY_SERVER_USERNAME = azurerm_container_registry.container_registry.admin_username
    DOCKER_REGISTRY_SERVER_PASSWORD = azurerm_container_registry.container_registry.admin_password

    DBHOST = azurerm_mysql_server.mysql_server.fqdn
    DBUSER = azurerm_mysql_server.mysql_server.administrator_login
    DBPASS = azurerm_mysql_server.mysql_server.administrator_login_password
    DBNAME = "pagopatest"
  }

  # Configure Docker Image to load on start
  site_config {
    linux_fx_version = "DOCKER|pagopamock.azurecr.io/pagopamock:v1.6.2"
    always_on        = "true"

    dynamic "ip_restriction" {
      for_each = var.ip_restriction 
      content {
        ip_address = ip_restriction.value["ip_address"]  
      }
    }
  }

  identity {
    type = "SystemAssigned"
  }
    
  tags = var.tags
}
/*
resource "azurerm_app_service_certificate" "certificate" {
  name                = "pagopamock-cert-2"
  resource_group_name = azurerm_resource_group.resource_group.name
  location            = azurerm_resource_group.resource_group.location
  pfx_blob            = filebase64("../certs/pagopamock.pfx")
  password            = var.cert_password
}
*/