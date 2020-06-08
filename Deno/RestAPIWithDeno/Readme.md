## Simple TODO rest API in deno.

This is a sample project to start with rest API in deno. 

### Prerequisites 

1. Install Deno
2. Basic knowledge of HTML, JS

### How to start 

1. Clone the repository
2. Go to the directory `Deno/RestAPIWithDeno`

```
cd RestAPIWithDeno\
```
3. Enter the follwoing command 

```
deno run --allow-net server.ts
```

4. Open the link [http://localhost:8080](http://localhost:8080) with postman and you can test complete CRUD application using following APIs

API|Method|Description
-----|-----|-----
http://localhost:8080/todos/  |   GET     |   Fetch All todos
http://localhost:8080/todos/{id}  |GET    |   Fetch todo by ID
http://localhost:8080/todos/      |POST   |   Create New todo
http://localhost:8080/todos/{id}  |PUT    |   Update todo by ID
http://localhost:8080/todos/{id}  |DELETE    |   Delete todo by ID







