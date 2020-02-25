terraform {
  required_version  = ">=0.12.20"
  backend "azurerm" {
    resource_group_name   = "rg-pagopa-mock-terraform"
    storage_account_name  = "stpagopamocktstate"
    container_name        = "tstate"
    key                   = "terraform.tfstate"
  }
}

provider "azurerm" {
  version = "~> 1.42.0"
}

# Create a new Resource Group
resource "azurerm_resource_group" "resource_group" {
  name     = "rg-pagopa-mock"
  location = "westeurope"

  tags = {
    environment = "Development"
    terraform   = "True"
  }
}

resource "azurerm_container_registry" "container_registry" {
  name                = "pagopamock"
  resource_group_name = azurerm_resource_group.resource_group.name
  location            = azurerm_resource_group.resource_group.location
  sku                 = "Premium"
  admin_enabled       = true

  tags = {
    environment = "Development"
    terraform   = "True"
  }
}

# Create an App Service Plan with Linux
/*
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

  tags = {
    environment = "Development"
    terraform   = "True"
  }
}


# Create an Azure Web App for Containers in that App Service Plan
resource "azurerm_app_service" "app_service" {
  name                = "app-pagopa-mock"
  location            = azurerm_resource_group.resource_group.location
  resource_group_name = azurerm_resource_group.resource_group.name
  app_service_plan_id = azurerm_app_service_plan.app_service_plan.id

  # Do not attach Storage by default
  app_settings = {
    WEBSITES_ENABLE_APP_SERVICE_STORAGE = false
    WEBSITES_PORT                       = 80
    #DOCKER_REGISTRY_SERVER_URL      = "https://pagopamock.azurecr.io"
    DOCKER_REGISTRY_SERVER_URL      = azurerm_container_registry.container_registry.login_server
    DOCKER_REGISTRY_SERVER_USERNAME = azurerm_container_registry.container_registry.admin_username
    DOCKER_REGISTRY_SERVER_PASSWORD = azurerm_container_registry.container_registry.admin_password
  }

  # Configure Docker Image to load on start
  site_config {
    linux_fx_version = "DOCKER|pagopamock.azurecr.io/pagopamock:v1.0.0"
    always_on        = "true"
  }

  identity {
    type = "SystemAssigned"
  }

  tags = {
    environment = "Development"
    terraform   = "True"
  }
}

resource "azurerm_app_service_custom_hostname_binding" "example" {
  hostname            = "www.pagopa-mock.pagopa.it"
  app_service_name    = azurerm_app_service.app_service.name
  resource_group_name = azurerm_resource_group.resource_group.name
}
*/


resource "azurerm_container_group" "container_group" {
  name                = "pagopa-mock-container"
  location            = azurerm_resource_group.resource_group.location
  resource_group_name = azurerm_resource_group.resource_group.name
  ip_address_type     = "public"
  dns_name_label      = "pagopa-mock"
  os_type             = "Linux"

  container {
    name   = "pagopamock"
    image  = "pagopamock.azurecr.io/pagopamock:v1.2.0"
    cpu    = "0.5"
    memory = "1.5"

    ports {
      port     = 443
      protocol = "TCP"
    }
  }

  image_registry_credential {
    username = azurerm_container_registry.container_registry.admin_username
    password = azurerm_container_registry.container_registry.admin_password
    server   = azurerm_container_registry.container_registry.login_server
  }

  tags = {
    environment = "Development"
    terraform   = "True"
  }
}