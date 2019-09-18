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
db.users.updateOne({_id: ObjectId("5d80b8476ee7f959449f51c4")}, {$set: {hobbies: [{title: "photography", hoursPerWeek: 5}, {title: 'soccer', hoursPerWeek: 6}], birthday: new Date("1981-05-16T16:00Z")}})

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

### Updating arrays:

**Update array elements:**
```
db.users.updateMany({'hobbies.title': 'photography'}, {$set: {'hobbies.$.title': 'Photography'}})
```

**Update all array elements:**
With the query below we add an new key value pair named "equipment" to each object in the hobbies array of each user.
In this case equipment is just an empty array.
```
db.users.updateMany({}, {$set: {"hobbies.$[].equipment": []}})
```

**Update specific array elements (arrayFilters):**
Now let's say that users are only allowed 4 hours per week for soccer. We can change the hoursPerWeek property on all hobbies objects that has a title of soccer.
```
db.users.updateMany({}, {$set: {"hobbies.$[el].hoursPerWeek": 4}}, {arrayFilters: [{"el.title": {$eq: "soccer"}}]})

```

**Adding an array element:**
```
db.users.updateOne({name: "jane"}, {$push: {hobbies: {title: 'soccer', hoursPerWeek: 4, equipment: []}}})
```

**Adding multiple array elements:**
Optional functions like $sort and $slice can also be passed in.
In this case we $sort all hobbies by hours per week (even existing hobbies will be sorted).
```
db.users.updateOne(
    {name: "jane"}, 
    {
        $push: {
	    hobbies: {
                $each: [
		    {title: 'painting', hoursPerWeek: 10, equipment: ['paint', 'paint brushes']}, 
		    {title: 'video games', hoursPerWeek: 6, equipment: ['ps4']}
		], 
		$sort: {hoursPerWeek: -1} 
	    }
	}
     }
)
```

**Adding only unique documents ($addToSet):**
```
db.users.updateOne({name: 'john'}, {$addToSet: {hobbies: {title: 'rugby', hoursPerWeek: 10}}})
// running the above value twice will not result in duplicate entries (like with $push), 

// however, if you change any value (e.g. hoursPerWeek to 11) then the query will insert another document.
db.users.updateOne({name: 'john'}, {$addToSet: {hobbies: {title: 'rugby', hoursPerWeek: 11}}})
```

**Removing array elements:**
```
db.users.updateOne({name: 'jane'}, {$pull: {hobbies: {title:  "video games"}}})

// another example 
db.users.updateOne({name: 'jane'}, {$pull: {hobbies: {$gt: {hoursPerWeek: 5}}}})

// remove last element
db.users.updateOne({name: 'jane'}, {$pop: {hobbies: 1}})

// remove first element
db.users.updateOne({name: 'jane'}, {$pop: {hobbies: -1}})
```








