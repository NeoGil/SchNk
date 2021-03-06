import { Component, OnInit } from '@angular/core';
import {NavigationService} from "../../../services/navigation.service";
import {Navigation} from "../../../Models/navigation";

@Component({
  selector: 'app-layout',
  templateUrl: './layout.component.html',
  styleUrls: ['./layout.component.sass']
})
export class LayoutComponent implements OnInit {

  constructor(
    private navigationService: NavigationService,
  ) { }

  showFiller = false;

  navigation: Navigation[]
  navMenu: boolean = true;

  ngOnInit(): void {
    this.getMenu();
  }

  getMenu(): void {
    this.navigationService.getNavigation().subscribe(
      (data: Navigation[]) => {
        this.navigation = data;
      }
    );
  }

}
