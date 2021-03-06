import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import {MaterialModule} from "./modules/material/material.module";
import { LayoutComponent } from './components/layout/layout/layout.component';
import { NavigationComponent } from './components/layout/navigation/navigation.component';
import { PreloaderComponent } from './components/layout/preloader/preloader.component';
import { SidenavListComponent } from './components/layout/sidenav-list/sidenav-list.component';
import {HTTP_INTERCEPTORS, HttpClientModule} from "@angular/common/http";
import {PreloaderInterceptor} from "./interceptors/preloader.interceptor";
import { CoursesComponent } from './components/courses/courses.component';
import { CourseComponent } from './components/course/course.component';
import { MaterialsComponent } from './components/materials/materials.component';
import { MaterialComponent } from './components/material/material.component';
import {CommonModule} from "@angular/common";
import {FormsModule} from "@angular/forms";
import {SanitizeHtmlPipe} from "./components/materials/sanitizeHtml.component";
import { SidenavComponent } from './components/sidenav/sidenav.component';
import { BreadcrumbsComponent } from './components/breadcrumbs/breadcrumbs.component';
import { FooterComponent } from './components/layout/footer/footer.component';
import { MainComponent } from './components/main/main.component';
import {LoaderInterceptor} from "./interceptors/loader.interceptor";
import { LayoutModule } from '@angular/cdk/layout';
import { MatToolbarModule } from '@angular/material/toolbar';
import { MatButtonModule } from '@angular/material/button';
import { MatSidenavModule } from '@angular/material/sidenav';
import { MatIconModule } from '@angular/material/icon';
import { MatListModule } from '@angular/material/list';
import {NavComponent} from "./components/layout/nav/nav.component";


@NgModule({
  declarations: [
    AppComponent,
    LayoutComponent,
    NavigationComponent,
    PreloaderComponent,
    SidenavListComponent,
    CoursesComponent,
    CourseComponent,
    MaterialsComponent,
    MaterialComponent,
    SanitizeHtmlPipe,
    SidenavComponent,
    BreadcrumbsComponent,
    FooterComponent,
    MainComponent,
    NavComponent,
  ],
  imports: [
    BrowserModule,
    CommonModule,
    AppRoutingModule,
    NgbModule,
    BrowserAnimationsModule,
    MaterialModule,
    HttpClientModule,
    FormsModule,
    LayoutModule,
    MatToolbarModule,
    MatButtonModule,
    MatSidenavModule,
    MatIconModule,
    MatListModule,
  ],
  providers: [
    {
      provide: HTTP_INTERCEPTORS,
      useClass: PreloaderInterceptor,
      multi: true,
    },
    {
      provide: HTTP_INTERCEPTORS,
      useClass: LoaderInterceptor,
      multi: true,
    },
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
