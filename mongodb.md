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
	],
	availableHobbyHoursPerWeek: 24,
	"phone" : "00000000000000"
}
{
	"_id" : ObjectId("5d80b87d6ee7f959449f51c5"),
	"name" : "jane",
	"hobbies" : [
		{
			"title" : "hiking",
			"hoursPerWeek" : 4
		}
	],
	availableHobbyHoursPerWeek: 16,
	"phone" : "00000000000000"
	
}
```

**Update fields** (overwrites the hobbies array and adds birthday field):
```
db.users.updateOne({_id: ObjectId("5d80b8476ee7f959449f51c4")}, {$set: {hobbies: [{title: "photography", hoursPerWeek: 5}], birthday: new Date("1981-05-16T16:00Z")}})

```

**Increment a field:**
```
db.users.updateMany({}, {$inc: {availableHobbyHoursPerWeek: 1}})
```
So now John will have 25 hours allocated and Jane will have 17.

**$min and $max:**
Assume users are not allowed more than 24 hobby hours per week. In that case **$min** can be used to see if any user has more than 24 hours allocated and if so set the value to the maximum allowed hours.
john has 25 hours (his hours was incremented earlier) so the below query will set his available hours to 24.
```
db.users.updateMany({}, {$min: {availableHobbyHoursPerWeek: 24}})
```

Also assume that users must at least allocate 20 hobby hours per week. Then **$max** can be used to make sure that the availableHobbyHoursPerWeek field is set to a minimum of 20. 
Jane only has 17 hours allocated so the following query will set her allocated hours to 20:
```
db.users.updateMany({}, {$max: {availableHobbyHoursPerWeek: 20}})
```

**Remove ($unset) a field:**
```
db.users.updateMany({}, {$unset: {phone: ""}})
```

**Rename fields:**
```
db.users.updateMany({}, {$rename: {birthday: "birthDate"}})
```

**Update or create (upsert):**
```
db.users.updateOne({name: "jim"}, {$set: {hobbies: [{title: "cars", hoursPerWeek: 20}]}}, {upsert: true})
```

### Update nested arrays:

```
db.users.updateMany({'hobbies.title': 'photography'}, {$set: {'hobbies.$.title': 'Photography'}})
```






