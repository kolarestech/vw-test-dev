import { Injectable } from '@angular/core';
import {BaseService} from "./base.service";

@Injectable({
  providedIn: 'root'
})
export class AuthStorageService {
  constructor(
    private _base: BaseService
  ) {

  }

  saveLoggedUser(data: any) {
    this._base.setObject("loggedUser", data);
  }

  saveToken(token: any) {
    this._base.setString("peptoken", token);
  }

  getToken() {
    return this._base.getString("peptoken");
  }

  getLoggedUser() : any {
    return this._base.getObject("loggedUser");
  }

  isLogged() {
    return !!this._base.getString("peptoken");
  }

  logout() {
    this._base.delete("loggedUser");
    this._base.delete("peptoken");
  }
}
