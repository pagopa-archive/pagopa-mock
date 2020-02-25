resource "random_password" "mysql_password" {
  length = 16
  special = true
  override_special = "#?&$!"
}

# data "azurerm_key_vault_secret" "mysqladministratorpassword" {
#   name         = "mysqladministratorpassword"
#   key_vault_id = azurerm_key_vault.key_vault.id
# }

resource "azurerm_mysql_server" "mysql_server" {
  name                = "mysql-pagopa-mock"
  location            = azurerm_resource_group.resource_group.location
  resource_group_name = azurerm_resource_group.resource_group.name

  sku_name = "B_Gen5_2"

  storage_profile {
    storage_mb            = 5120
    backup_retention_days = 7
    geo_redundant_backup  = "Disabled"
  }

  administrator_login          = "mysqladmin"
  administrator_login_password = random_password.mysql_password.result
  # Save the password in the key vault. This is not a good practice
  #administrator_login_password = data.azurerm_key_vault_secret.mysqladministratorpassword.value
  version                      = "5.7"
  ssl_enforcement              = "Enabled"

  tags = {
    environment = "Development"
    terraform   = "True"
  }
}

resource "azurerm_mysql_database" "database_pagopa-test" {
  name                = "pagopatest"
  resource_group_name = azurerm_resource_group.resource_group.name
  server_name         = azurerm_mysql_server.mysql_server.name
  charset             = "utf8"
  collation           = "utf8_unicode_ci"

}

# This rule is to enable the 'Allow access to Azure services' checkbox
resource "azurerm_mysql_firewall_rule" "mysql_firewall_rule" {
  name                = "mysql-firewall"
  resource_group_name = azurerm_resource_group.resource_group.name
  server_name         = azurerm_mysql_server.mysql_server.name
  start_ip_address    = "0.0.0.0"
  end_ip_address      = "0.0.0.0"
}