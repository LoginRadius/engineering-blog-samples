import { Router } from "https://deno.land/x/oak/mod.ts";

const router = new Router();
// controller
import todoController from "../controllers/todo.ts";

router
  .get("/todos", todoController.getAll)
  .post("/todos", todoController.create)
  .get("/todos/:id", todoController.getById)
  .put("/todos/:id", todoController.update)
  .delete("/todos/:id", todoController.delete);

export default router;