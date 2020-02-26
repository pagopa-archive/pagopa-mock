terraform {
  required_version = ">=0.12.20"
  backend "azurerm" {
    resource_group_name  = "rg-pagopa-mock-terraform"
    storage_account_name = "stpagopamocktstate"
    container_name       = "tstate"
    key                  = "terraform.tfstate"
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
