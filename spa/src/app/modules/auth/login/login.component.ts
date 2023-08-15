import { Component } from '@angular/core';
import {AuthStorageService} from "../../../services/local-storage/auth.service";
import {AuthService} from "../../../services/auth.service";
import {ToastrService} from "ngx-toastr";
import {Router} from "@angular/router";

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent {
  email: any = ''
  password: any = ''
  constructor(
    private _authService: AuthService,
    private _authStorageService: AuthStorageService,
    private _route: Router

  ) { }
  go() {
    this._authService.login(this.email, this.password).subscribe(
      response => {
        if(response.token) {
          this._authStorageService.saveLoggedUser(response.data);
          this._authStorageService.saveToken(response.token);
          this._route.navigate(['app']);
        }
      }
    );
  }
}
