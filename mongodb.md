###MongoDB

Start server with different dbpath and port number:
```
mongod --dbpath ~/data/db --port 27018
```

Then access it by starting the Mongo client and specifying the port number:
```
mongo --port 27018
```

Clear screen:
```
cls
```

Show databases:
```
show dbs
```

Switch to or create a database (will only be created when inserting data):
```
use myshop
```

Insert data into a collection (new collection will be created on the fly):
```
db.products.insertOne({name: "New book", price: 13.99, description: "It's good!", author: { first_name: "John", last_name: "Smith"}})
```

Retrieve all products:
```
db.products.find() or db.products.find().pretty()
```

Retrieve a specific product:
```
db.products.find("5d79eafd72aa234f754a9562")
```


