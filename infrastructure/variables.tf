variable "tags" {
  type = map
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
  type = list(object({
    ip_address = string
  }))
  default = [
    {
      # Sia Office
      ip_address = "193.203.229.20"
    },
    {
      # Sia Office
      ip_address = "193.203.229.21"
    },
    {
      # PagoPAHQ main (Rome office)
      ip_address = "93.63.219.230"
    },
    {
      # PagoPAHQ backup (Rome office)
      ip_address = "93.63.219.231"
    },
    {
      # Walter Traspadini home
      ip_address = "79.12.75.253"
    },
    {
      # Gianni Papetti home
      ip_address = "151.24.84.81"
    },
    {
      # Mario Gammaldi home
      ip_address = "151.25.100.59"
    },
    {
      # Mario Gammaldi France
      ip_address = "151.25.109.108"
    },
    {
      # Gianni Papetti home
      ip_address = "151.15.108.28"
    },
    {
      # Nord VPN
      ip_address = "212.102.54.114"
    },
    {
      # Laura Bordin (Milano)
      ip_address = "93.146.98.76"
    },
    {
      # Pasquale S.
      ip_address = "2.38.21.180"
    }
  ]
}

## Log Analytics Workspce
variable "log_analytics_workspace_name" {
  type        = string
  description = "The name of the log anlytics workspace"
  default     = "log-pagopamock"
}

variable "log_analytics_workspace_sku" {
  type        = string
  description = "Specifies the Sku of the Log Analytics Workspace"
  default     = "PerGB2018"
}

variable "log_analytics_workspace_retantion" {
  type        = number
  description = "The workspace data retention in days."
  default     = 30
}

/*
variable "cert_password" {
  type        = string
  description = "import certificate password"
}
*/
