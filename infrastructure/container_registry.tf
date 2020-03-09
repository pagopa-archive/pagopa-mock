resource "azurerm_container_registry" "container_registry" {
  name                = "pagopamock"
  resource_group_name = azurerm_resource_group.resource_group.name
  location            = azurerm_resource_group.resource_group.location
  sku                 = "Premium"
  admin_enabled       = true

  tags = var.tags
}