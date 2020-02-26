/*
output "app_service_name" {
  value = azurerm_app_service.app_service.name
}

output "app_service_hostname" {
  value = "https://${azurerm_app_service.app_service.default_site_hostname}"
}
*/

# Container Registry 
output "container_registry_name" {
  value = azurerm_container_registry.container_registry.name
}

output "container_registry_url" {
  value = azurerm_container_registry.container_registry.login_server
}

output "container_registry_username" {
  value = azurerm_container_registry.container_registry.admin_username
}

output "container_registry_password" {
  value = azurerm_container_registry.container_registry.admin_password
}

output "mysql_server_user" {
  value = azurerm_mysql_server.mysql_server.administrator_login
}

output "mysql_server_password" {
  value = azurerm_mysql_server.mysql_server.administrator_login_password
}

output "mysql_server_fqdn" {
  value = azurerm_mysql_server.mysql_server.fqdn
}