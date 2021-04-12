import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
})
export class AppComponent implements OnInit {
  constructor(private router: Router) {}

  ngOnInit() {
    if (window.location.pathname === "/") {
      if (localStorage.getItem('token')) {
        this.router.navigate(['/profile']);
      } else {
        this.router.navigate(['/login']);
      }
    }
  }
}
