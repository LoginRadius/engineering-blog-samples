import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import config from '../config';
import { ProfileService } from '../profile.service';
import { Profile } from './profile';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.scss'],
})
export class ProfileComponent implements OnInit {
  profile: Profile;
  loginRadius: any;

  constructor(private configService: ProfileService, private router: Router) {
    const token = localStorage.getItem('token');
  }

  ngOnInit(): void {
    this.configService.getProfile().subscribe(
      (data: Profile) => {
        this.profile = { ...data };
      },
      (err: any) => {
        if (err.status === 403) {
          localStorage.removeItem('token');
          this.router.navigate(['login']);
        }
      }
    );
  }

  logout() {
    localStorage.removeItem('token');
    window.location.href = `https://${config.APP_NAME}.hub.loginradius.com/auth.aspx?action=logout`;
  }
}
