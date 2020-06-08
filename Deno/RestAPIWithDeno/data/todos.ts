import { v4 } from "https://deno.land/std/uuid/mod.ts";
// interface
import Todo from '../interfaces/Todo.ts';

let todos: Todo[] = [
  {
    id: v4.generate(),
    task: 'Hello world app with Deno',
    done: true,
  },
  {
    id: v4.generate(),
    task: 'Simple Rest API with Deno',
    done: false,
  },
];

export default todos;