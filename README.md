# pagopa-mock

This repository contains the code to run the pagoPA mock server is Azure.

The mock server itself simulates a **Public Administration Web Site** in order to initiate a pagoPA payment.

Traces all pagopa datas in order to assess a pagoPA function or test an PA/PSP integration. 
This functionality has not yet a User interface

It is a legacy php application running within Apache providing http / SAOP interface.

## Infrastructure

### Pre Requirements
    * You need a Azure active subscription
    * The azure cli installed
    * Terraform 0.12.20 or grater installed

### Steps
Login into your azure account and choose activate your subscription:

```
$ az login 
$ az account set --subscription <your subscription>
```

Create the storage account for sharing your terraform state file:

```
$ cd infrastructure/
$ ./config_storage_account.sh
```
You should run the previous command **only the first time** you set up the terraform workspace.

The command itself will end presenting you the access key of the storage account it creates: 
```
access_key: <your account key>
```
Set the following env variable:

```
export AZURE_STORAGE_KEY=<your account key>
```

Spin up the infrastructure:
```
terraform init
terraform apply

```


## Deploy

### Per requisits

* You must satisfy the same pre requisites defined in the infrastructure paragraph.
* Docker 18.09.9 or grather installed

### Steps 

In the root folder of the project run the command to build the docker image:

```
$ sudo docker build -t pagopamock.azurecr.io/pagopamock:latest .
```

Assign a tag to the version you want to deploy. eg:

```
$ sudo docker tag pagopa/pagopa-mock pagopamock.azurecr.io/pagopamock:v1.2.0
```

Login to the docker registry. You need to do that only the first time.
```
$ sudo docker login https://pagopamock.azurecr.io
```
Username and password were shown in the output of the terraform apply commnad.
You can see them again with:
```
$ terraform output
```

Push the image to the **azure** private **docker registry**:

```
$ sudo docker push pagopamock.azurecr.io/pagopamock:v1.2.0
```

To run a new deply edit the **container_instance.tf** file in the **infrastructure** folder and set the version you want to deploy:

```

  container {
    name   = "pagopamock"
    image  = "pagopamock.azurecr.io/pagopamock:v1.2.0"
```
in the example version **v.1.2.0**

Run one more time the terraform apply command.
