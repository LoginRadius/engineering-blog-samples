import { Router } from "https://deno.land/x/oak/mod.ts";
import {signup, signin} from "../controllers/users.ts";
import {create, getTasks, getById, updateById, deleteTask} from "../controllers/tasks.ts";
import { authourized } from "../middlewares/isAuthorized.ts";

const router = new Router();

//User routes
router.post("/api/signup", signup)
      .post("/api/signin", signin);

//Task routes
router.post("/api/tasks", authourized, create)
      .get("/api/tasks", authourized, getTasks)
      .get("/api/tasks/:taskId", authourized, getById)
      .patch("/api/tasks/:taskId", authourized, updateById)
      .delete("/api/tasks/:taskId", authourized, deleteTask);

export default router;