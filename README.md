# 🍎🥕 Fruits and Vegetables

## 🎯 Goal
We want to build a service which will take a `request.json` and:
* Process the file and create two separate collections for `Fruits` and `Vegetables`
* Each collection has methods like `add()`, `remove()`, `list()`;
* Units have to be stored as grams;
* Store the collections in a storage engine of your choice. (e.g. Database, In-memory)
* Provide an API endpoint to query the collections. As a bonus, this endpoint can accept filters to be applied to the returning collection.
* Provide another API endpoint to add new items to the collections (i.e., your storage engine).
* As a bonus you might:
  * consider giving option to decide which units are returned (kilograms/grams);
  * how to implement `search()` method collections;
  * use latest version of Symfony's to embbed your logic 

### ✔️ How can I check if my code is working?
You have two ways of moving on:
* You call the Service from PHPUnit test like it's done in dummy test (just run `bin/phpunit` from the console)

or

* You create a Controller which will be calling the service with a json payload

## 💡 Hints before you start working on it
* Keep KISS, DRY, YAGNI, SOLID principles in mind
* Timebox your work - we expect that you would spend between 3 and 4 hours.
* Your code should be tested

## When you are finished
* Please upload your code to a public git repository (i.e. GitHub, Gitlab)

## 🐳 Docker image
Optional. Just here if you want to run it isolated.

### 📥 Pulling image
```bash
docker pull tturkowski/fruits-and-vegetables
```

### 🧱 Building image
```bash
docker build -t tturkowski/fruits-and-vegetables -f docker/Dockerfile .
```

### 🏃‍♂️ Running container
```bash
docker run -it -w/app -v$(pwd):/app tturkowski/fruits-and-vegetables sh 
```

### 🛂 Running tests
```bash
docker run -it -w/app -v$(pwd):/app tturkowski/fruits-and-vegetables bin/phpunit
```

### ⌨️ Run development server
```bash
docker run -it -w/app -v$(pwd):/app -p8080:8080 tturkowski/fruits-and-vegetables php -S 0.0.0.0:8080 -t /app/public
# Open http://127.0.0.1:8080 in your browser
```


### Created endpoints

#### POST /foods - Load request.json data

```
curl --location 'http://localhost:8080/foods' \
--header 'Content-Type: application/json' \
--data '[
  {
    "id": 1,
    "name": "Carrot",
    "type": "vegetable",
    "quantity": 10922,
    "unit": "g"
  },
  {
    "id": 2,
    "name": "Apples",
    "type": "fruit",
    "quantity": 20,
    "unit": "kg"
  },
  {
    "id": 3,
    "name": "Pears",
    "type": "fruit",
    "quantity": 3500,
    "unit": "g"
  },
  {
    "id": 4,
    "name": "Melons",
    "type": "fruit",
    "quantity": 120,
    "unit": "kg"
  },
  {
    "id": 5,
    "name": "Beans",
    "type": "vegetable",
    "quantity": 65000,
    "unit": "g"
  },
  {
    "id": 6,
    "name": "Beetroot",
    "type": "vegetable",
    "quantity": 950,
    "unit": "g"
  },
  {
    "id": 7,
    "name": "Broccoli",
    "type": "vegetable",
    "quantity": 3,
    "unit": "kg"
  },
  {
    "id": 8,
    "name": "Berries",
    "type": "fruit",
    "quantity": 10000,
    "unit": "g"
  },
  {
    "id": 9,
    "name": "Tomatoes",
    "type": "vegetable",
    "quantity": 5,
    "unit": "kg"
  },
  {
    "id": 10,
    "name": "Celery",
    "type": "vegetable",
    "quantity": 20,
    "unit": "kg"
  },
  {
    "id": 11,
    "name": "Cabbage",
    "type": "vegetable",
    "quantity": 500,
    "unit": "kg"
  },
  {
    "id": 12,
    "name": "Onion",
    "type": "vegetable",
    "quantity": 50,
    "unit": "kg"
  },
  {
    "id": 13,
    "name": "Cucumber",
    "type": "vegetable",
    "quantity": 8,
    "unit": "kg"
  },
  {
    "id": 14,
    "name": "Bananas",
    "type": "fruit",
    "quantity": 100,
    "unit": "kg"
  },
  {
    "id": 15,
    "name": "Oranges",
    "type": "fruit",
    "quantity": 24,
    "unit": "kg"
  },
  {
    "id": 16,
    "name": "Avocado",
    "type": "fruit",
    "quantity": 10,
    "unit": "kg"
  },
  {
    "id": 17,
    "name": "Lettuce",
    "type": "fruit",
    "quantity": 20830,
    "unit": "g"
  },
  {
    "id": 18,
    "name": "Kiwi",
    "type": "fruit",
    "quantity": 10,
    "unit": "kg"
  },
  {
    "id": 19,
    "name": "Kumquat",
    "type": "fruit",
    "quantity": 90000,
    "unit": "g"
  },
  {
    "id": 20,
    "name": "Pepper",
    "type": "vegetable",
    "quantity": 150,
    "unit": "kg"
  }
]
'
```

#### POST /foods/fruits
```json
{
  "id": 10,
  "name": "Advocato",
  "quantity": 1043,
  "unit": "g"
}
```

Example call:
```bash
curl --location 'http://localhost:8080/foods/fruits' \
--header 'Content-Type: application/json' \
--data '{
    "id": 10,
    "name": "Advocato",
    "quantity": 1043,
    "unit": "g"
  }'
```
#### GET /foods/fruits

#### GET /foods/fruits?unit=kg

#### GET /foods/vegetables