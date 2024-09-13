# PHP SNCF API Client

Fully object-oriented PHP client for the SNCF API.

## Installation

```bash
composer require shockedplot7560/sncf-api
```

## Description

This client is a wrapper around the SNCF API. It allows you to easily interact with the API and get the data you need.

Currently, the client supports the following endpoints:
- `journeys`: Get the journeys between two stations
- `places`: Get the places that match a query

## Requirements

- PHP 8.1 or higher
- API key from SNCF (you can get one [here](https://www.digital.sncf.com/startup/api/))