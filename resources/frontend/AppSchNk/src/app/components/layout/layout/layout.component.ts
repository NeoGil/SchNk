import { Component, OnInit } from '@angular/core';
import {NavigationService} from "../../../services/navigation.service";
import {Navigation} from "../../../Models/navigation";
import {NavigationEnd, Router} from "@angular/router";

@Component({
  selector: 'app-layout',
  templateUrl: './layout.component.html',
  styleUrls: ['./layout.component.sass']
})
export class LayoutComponent implements OnInit {

  navigation: Navigation[]
  navMenu: boolean = true;

  constructor(
    private navigationService: NavigationService,
    private router: Router,
  ) { }

  ngOnInit(): void {
    this.getMenu();
  }

  getMenu(): void {
    this.navigationService.getNavigation().subscribe(
      (data: Navigation[]) => {
        this.navigation = data;
        console.log(this.navigation);
      }
    );
  }

}
