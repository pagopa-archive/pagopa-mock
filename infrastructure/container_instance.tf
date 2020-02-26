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

resource "azurerm_container_group" "container_group" {
  name                = "pagopa-mock-container"
  location            = azurerm_resource_group.resource_group.location
  resource_group_name = azurerm_resource_group.resource_group.name
  ip_address_type     = "public"
  dns_name_label      = "pagopa-mock"
  os_type             = "Linux"

  container {
    name   = "pagopamock"
    image  = "pagopamock.azurecr.io/pagopamock:v1.3.2"
    cpu    = "0.5"
    memory = "1.5"

    ports {
      port     = 443
      protocol = "TCP"
    }

    environment_variables = {
      DBHOST = azurerm_mysql_server.mysql_server.fqdn
      DBUSER = azurerm_mysql_server.mysql_server.administrator_login
      DBPASS = azurerm_mysql_server.mysql_server.administrator_login_password
      DBNAME = "pagopatest"
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
