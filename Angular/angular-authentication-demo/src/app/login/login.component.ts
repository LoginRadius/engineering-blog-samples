import { Component, OnInit } from '@angular/core';

import { ActivatedRoute, Router } from '@angular/router';

import config from '../config';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss'],
})
export class LoginComponent implements OnInit {
  constructor(private route: ActivatedRoute, private router: Router) {
    this.route.queryParams.subscribe((params) => {
      if (params.token || localStorage.getItem('token')) {
        localStorage.setItem('token', params.token);
        this.router.navigate(['/profile']);
      } else {
        window.location.href = `https://${config.APP_NAME}.hub.loginradius.com/auth.aspx?return_url=${window.location.origin}/login`;
      }
    });
  }

  ngOnInit(): void {}
}
