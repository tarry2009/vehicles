 
# Modus Create PHP API Development Application

## Installation
You must have installed LAMP (Linux Apache Mysql PHP) or XAMPP server 

Apache rewrite module must be enable.
Just clone the project in in your www or htdocs directory.
```bash
git clone https://github.com/tarry2009/vehicles.git

```


Go into project folder
Then you can install all dependencies via Composer by running this command:
```bash
composer install

```
Composer detail:
http://rapidsol.blogspot.com/2015/03/download-composerphar.html

```

#Give write permissions to cache and log  
storage directory must be writeable

### Requirement 1

Visit the following Requirement 1 URLs and get meaningful JSON output from them:

* `GET http://localhost/vehicles/2015/Audi/A3`
* `GET http://localhost/vehicles/2015/Toyota/Yaris`
* `GET http://localhost/vehicles/2015/Ford/Crown Victoria`
* `GET http://localhost/vehicles/undefined/Ford/Fusion`


# Requirement 2

Application endpoint:

```bash
POST http://localhost/vehicles/
```

Which, when called with an application/JSON body as follows:

```bash
{
    "modelYear": 2015,
    "manufacturer": "Audi",
    "model": "A3"
}
```

Respond with precisely the following JSON if there are results:

```bash
{
    Count: <NUMBER OF RESULTS>,
    Results: [
        {
            Description: "<VEHICLE DESCRIPTION>",
            VehicleId: <VEHICLE ID>
        },
        {
            Description: "<VEHICLE DESCRIPTION>",
            VehicleId: <VEHICLE ID>
        },
        {
            Description: "<VEHICLE DESCRIPTION>",
            VehicleId: <VEHICLE ID>
        },
        {
            Description: "<VEHICLE DESCRIPTION>",
            VehicleId: <VEHICLE ID>
        }
    ]
}
```


# Requirement 3

When the endpoint:

```bash
GET http://localhost/vehicles/<MODEL YEAR>/<MANUFACTURER>/<MODEL>?withRating=true
```
Respond with precisely the following JSON if there are results:

```bash
{
    Count: <NUMBER OF RESULTS>,
    Results: [
        {
            CrashRating: "<CRASH RATING>"
            Description: "<VEHICLE DESCRIPTION>",
            VehicleId: <VEHICLE ID>
        },...
    ]
}
```
