import { ITodo } from './todo-state';

export namespace TodoActions {
    export class AddTodo {
        static readonly type = '[Todo] Add';
        constructor(public payload: ITodo) { }
    }

    export class markDone {
        static readonly type = '[Todo] markDone';
        constructor(public payload: string, public is_done: boolean) { }
    }

    export class FetchAllTodos {
        static readonly type = '[Todo] Fetch All';
    }

    export class DeleteTodo {
        static readonly type = '[Todo] Delete';
        constructor(public id: number) { }
    }
}
