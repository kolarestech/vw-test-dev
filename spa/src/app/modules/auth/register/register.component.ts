import { Component, OnInit } from '@angular/core';
import {AuthService} from "../../../services/auth.service";
import {Router} from "@angular/router";

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss']
})
export class RegisterComponent {
  public user: any = {}

  constructor(
    private _authService: AuthService,
    private _routerNavigation: Router) {}
  register() {
    this._authService.register(this.user).subscribe(
      response => {
        this._routerNavigation.navigate(['auth/login']);
      }
    );
  }
}
