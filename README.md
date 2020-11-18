Hi! here is api and searchform what work with it

Search form located by the way  {hostname}/searchform 
Constructed with vue.js, axios, bootstrap, Element UI


Api search endpoint: {hostname}/api/search 
and it works with get and post requests, working params for search are: name,price_from,price_to,bedrooms,bathrooms,storeys,garages, all of them are optional  and can be multiple                   
return database data in json format

Run next command for data seeding after you do migrate: 
php artisan db:seed --class=HousesSeeder           


Request examples:
curl -d '{"bedrooms":"4","bathrooms":"2","name":"Victoria","price_from":"350000","price_to":"400000", "storeys":"2","garages":"2"}' -H "Content-Type: application/json" -X POST '{hostname}/api/search'

curl -d  -X GET '{hostname}/api/search?bedrooms=4&bathrooms=3'
