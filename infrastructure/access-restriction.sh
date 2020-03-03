#!/bin/bash

RESOURCE_GROUP=rg-pagopa-mock
APP_NAME=app-pagopa-mock

# Allow access from Sia IP 
az webapp config access-restriction add --resource-group $RESOURCE_GROUP \
--name $APP_NAME \
--rule-name 'Allow Sia' \
--action Allow \
--ip-address 193.203.229.20/32 \
--priority 201

# Allow access grom Rome office
az webapp config access-restriction add --resource-group $RESOURCE_GROUP \
--name $APP_NAME \
--rule-name 'Rome PagoPa office' \
--action Allow \
--ip-address 85.44.51.73/32 \
--priority 301
