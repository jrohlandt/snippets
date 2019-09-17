# MongoDB

Start server with different dbpath and port number:
```
mongod --dbpath ~/data/db --port 27018
```

Then access it by starting the Mongo client and specifying the port number:
```
mongo --port 27018
```

**Clear screen:**
```
cls
```

**Show databases:**
```
show dbs
```

**Switch to or create a database (will only be created when inserting data):**
```
use myshop
```

**Show collections in current database:**
```
show collections
```

**Insert a document into a collection:**
```
db.products.insertOne({name: "New book", price: 13.99, description: "It's good!", author: { first_name: "John", last_name: "Smith"}})
```

**Retrieve all documents in a collection:**
```
db.products.find() or db.products.find().pretty()
```

**Retrieve a specific document:**
```
db.products.find({_id: ObjectId("5d79eafd72aa234f754a9562")})
```

**Import document or documents:**
```
mongoimport exported-users.json -d myDatabase -c  users --jsonArray --drop
```  


## Update Operations  

Collection for demonstration:
```
{
	"_id" : ObjectId("5d80b8476ee7f959449f51c4"),
	"name" : "john",
	"hobbies" : [
		{
			"title" : "cars",
			"hoursPerWeek" : 12
		},
		{
			"title" : "rugby",
			"hoursPerWeek" : 6
		}
	]
}
{
	"_id" : ObjectId("5d80b87d6ee7f959449f51c5"),
	"name" : "jane",
	"hobbies" : [
		{
			"title" : "hiking",
			"hoursPerWeek" : 4
		}
	]
}
```

**Update a field** (overwrites the existing hobbies array):
```
db.users.updateOne({_id: ObjectId("5d80b8476ee7f959449f51c4")}, {$set: {hobbies: [{title: "photography", hoursPerWeek: 5}]}})

```


