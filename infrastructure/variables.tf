variable "tags" {
  type    = map
  default = {
    environment = "Production"
    terraform   = "True"
  }
}

variable "location" {
  type    = string
  default = "westeurope"
}

variable "resource_group_name" {
  type    = string
  default = "rg-pagopa-mock"   
}

variable "ip_restriction" {
  type  = list(object({
    ip_address  = string
  }))
  default =[
    {
      # Sia Office
      ip_address = "193.203.229.20"
    },
    {
      # Sia Office
      ip_address = "193.203.229.21"
    },
   {
     # Rome office
     ip_address = "85.44.51.73"
   },
   {
     # Walter home
     ip_address = "79.12.75.253"
   },
   {
     # Gianni Papetti home
     ip_address = "151.27.28.240"
   },
   {
     # Mario Gammaldi home
     ip_address = "151.25.100.59"
   },
 ]
}

variable "cert_password" {
  type        = string
  description = "import certificate password"
}