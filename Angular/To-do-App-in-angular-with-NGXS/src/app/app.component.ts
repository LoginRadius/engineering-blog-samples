import { Component } from '@angular/core';
import { Store, Select } from '@ngxs/store';
import { TodoActions } from './state/todo-actions';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { TodoState, ITodo } from './state/todo-state';
import { Observable } from 'rxjs';
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'ngxs-todo-app';

  @Select(TodoState) todoList$: Observable<ITodo>;

  addForm = new FormGroup({
    title: new FormControl('', [Validators.required])
  });
  constructor(private store: Store){}
  onSubmit(form: any){
    this.store.dispatch(new TodoActions.AddTodo(form)).subscribe(() => {
      this.addForm.reset();
    });
  }
  markDone(id: string, is_done: boolean){
    this.store.dispatch(new TodoActions.markDone(id, is_done));
  }
}
