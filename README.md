

```
UniStay
├─ .editorconfig
├─ .git
│  ├─ COMMIT_EDITMSG
│  ├─ config
│  ├─ description
│  ├─ FETCH_HEAD
│  ├─ HEAD
│  ├─ hooks
│  │  ├─ applypatch-msg.sample
│  │  ├─ commit-msg.sample
│  │  ├─ fsmonitor-watchman.sample
│  │  ├─ post-update.sample
│  │  ├─ pre-applypatch.sample
│  │  ├─ pre-commit.sample
│  │  ├─ pre-merge-commit.sample
│  │  ├─ pre-push.sample
│  │  ├─ pre-rebase.sample
│  │  ├─ pre-receive.sample
│  │  ├─ prepare-commit-msg.sample
│  │  ├─ push-to-checkout.sample
│  │  ├─ sendemail-validate.sample
│  │  └─ update.sample
│  ├─ index
│  ├─ info
│  │  └─ exclude
│  ├─ logs
│  │  ├─ HEAD
│  │  └─ refs
│  │     ├─ heads
│  │     │  └─ main
│  │     └─ remotes
│  │        └─ origin
│  │           ├─ HEAD
│  │           └─ main
│  ├─ objects
│  │  ├─ 01
│  │  │  └─ 8c1453c9aa6010358638d5557711f053c533db
│  │  ├─ 0e
│  │  │  └─ c367dcefec1ecd6fb4e8a100922996a1c32446
│  │  ├─ 12
│  │  │  └─ 2cf135ccc762e558f9fd0ccd068af3aa6e9805
│  │  ├─ 4c
│  │  │  └─ e744c9eb2cb55469ed43639b38b2c3a124d3ff
│  │  ├─ 5f
│  │  │  └─ e3e9948a50008c4da9e62a0f71cd1bd66f7a95
│  │  ├─ 68
│  │  │  └─ 9c6122bbfa05dc1b300a5d0e30421e604af18b
│  │  ├─ 6e
│  │  │  └─ 6be0f960356e499db3bb603f860edc8cf97626
│  │  ├─ 84
│  │  │  ├─ 8b352658ae633dbda38b131a311c731314aa20
│  │  │  └─ d8b7e216cbff623ea3c3cf58ab34567d374ba1
│  │  ├─ 87
│  │  │  └─ 1d6a5abcdedb3300b2341a3621f952ed243ca8
│  │  ├─ 8c
│  │  │  └─ fb0b9b405f840e59fbea6f69dbfd222a05ca73
│  │  ├─ 94
│  │  │  └─ 70be1b15bc090946ef706e640f1ad9bf9fee58
│  │  ├─ 96
│  │  │  └─ d655ae3a6fa5bbea17ce6155f029dd20f32efe
│  │  ├─ 9a
│  │  │  └─ 5c87696367ed5d7b774495b3cabf0bc8e038e8
│  │  ├─ b4
│  │  │  └─ 302fcd48c3a8445043baacdc5ee6e72c6e7565
│  │  ├─ c2
│  │  │  └─ 658f80d8dca61edd06191c5c504864337be004
│  │  ├─ d5
│  │  │  ├─ a67b1738935c2fa42867846eaa99d3f11f8725
│  │  │  └─ da75d68ef68e45601ffe5394f1a73efd6a789e
│  │  ├─ f8
│  │  │  └─ 7a7f047ff54f7e10d28316107f73dac2fb8283
│  │  ├─ info
│  │  └─ pack
│  │     ├─ pack-dda081f37ec2947c34e8fd687978e8b5ddb91aa3.idx
│  │     ├─ pack-dda081f37ec2947c34e8fd687978e8b5ddb91aa3.pack
│  │     └─ pack-dda081f37ec2947c34e8fd687978e8b5ddb91aa3.rev
│  ├─ ORIG_HEAD
│  ├─ packed-refs
│  └─ refs
│     ├─ heads
│     │  └─ main
│     ├─ remotes
│     │  └─ origin
│     │     ├─ HEAD
│     │     └─ main
│     └─ tags
├─ .gitattributes
├─ .gitignore
├─ .styleci.yml
├─ app
│  ├─ Actions
│  │  ├─ Fortify
│  │  │  ├─ CreateNewUser.php
│  │  │  ├─ PasswordValidationRules.php
│  │  │  ├─ ResetUserPassword.php
│  │  │  ├─ UpdateUserPassword.php
│  │  │  └─ UpdateUserProfileInformation.php
│  │  └─ Jetstream
│  │     └─ DeleteUser.php
│  ├─ Console
│  │  └─ Kernel.php
│  ├─ Exceptions
│  │  └─ Handler.php
│  ├─ Http
│  │  ├─ Controllers
│  │  │  ├─ AdminController.php
│  │  │  ├─ AgentController.php
│  │  │  ├─ BookingController.php
│  │  │  ├─ Controller.php
│  │  │  ├─ DashboardController.php
│  │  │  ├─ MessageController.php
│  │  │  ├─ ProfileController.php
│  │  │  ├─ PropertyAmenityController.php
│  │  │  ├─ PropertyCategoryController.php
│  │  │  ├─ PropertyController.php
│  │  │  ├─ PropertyFeatureController.php
│  │  │  ├─ PropertyTypeController.php
│  │  │  ├─ ReviewController.php
│  │  │  ├─ SurroundingAreaController.php
│  │  │  ├─ UserController.php
│  │  │  └─ UsersController.php
│  │  ├─ Kernel.php
│  │  ├─ Middleware
│  │  │  ├─ Authenticate.php
│  │  │  ├─ EncryptCookies.php
│  │  │  ├─ isAdmin.php
│  │  │  ├─ isAgent.php
│  │  │  ├─ isUser.php
│  │  │  ├─ PreventRequestsDuringMaintenance.php
│  │  │  ├─ RedirectIfAuthenticated.php
│  │  │  ├─ TrimStrings.php
│  │  │  ├─ TrustHosts.php
│  │  │  ├─ TrustProxies.php
│  │  │  └─ VerifyCsrfToken.php
│  │  └─ Requests
│  │     ├─ amenities
│  │     │  ├─ StoreAmenityRequest.php
│  │     │  └─ UpdateAmenityRequest.php
│  │     ├─ categories
│  │     │  ├─ StoreCategoryRequest.php
│  │     │  └─ UpdateCategoryRequest.php
│  │     ├─ features
│  │     │  ├─ StoreFeatureRequest.php
│  │     │  └─ UpdateFeatureRequest.php
│  │     ├─ properties
│  │     │  ├─ StorePropertyRequest.php
│  │     │  └─ UpdatePropertyRequest.php
│  │     ├─ StoreUserRequest.php
│  │     ├─ surroundings
│  │     │  ├─ StoreSurroundingRequest.php
│  │     │  └─ UpdateSurroundingRequest.php
│  │     ├─ Types
│  │     │  ├─ StoreTypeRequest.php
│  │     │  └─ UpdateTypeRequest.php
│  │     ├─ UpdateProfileRequest.php
│  │     └─ UpdateUserRequest.php
│  ├─ Models
│  │  ├─ Booking.php
│  │  ├─ Message.php
│  │  ├─ Property.php
│  │  ├─ PropertyAmenity.php
│  │  ├─ PropertyCategory.php
│  │  ├─ PropertyFeature.php
│  │  ├─ PropertyType.php
│  │  ├─ Review.php
│  │  ├─ Role.php
│  │  ├─ SurroundingArea.php
│  │  └─ User.php
│  ├─ Notifications
│  │  └─ UserRejectedNotification.php
│  ├─ Providers
│  │  ├─ AppServiceProvider.php
│  │  ├─ BroadcastServiceProvider.php
│  │  ├─ EventServiceProvider.php
│  │  ├─ FortifyServiceProvider.php
│  │  ├─ JetstreamServiceProvider.php
│  │  └─ RouteServiceProvider.php
│  └─ View
│     └─ Components
│        ├─ AppLayout.php
│        └─ GuestLayout.php
├─ artisan
├─ bootstrap
│  ├─ app.php
│  ├─ cache
│  │  ├─ .gitignore
│  │  ├─ packages.php
│  │  └─ services.php
│  └─ providers.php
├─ composer.json
├─ composer.lock
├─ config
│  ├─ app.php
│  ├─ auth.php
│  ├─ broadcasting.php
│  ├─ cache.php
│  ├─ cors.php
│  ├─ database.php
│  ├─ filesystems.php
│  ├─ fortify.php
│  ├─ hashing.php
│  ├─ jetstream.php
│  ├─ logging.php
│  ├─ mail.php
│  ├─ queue.php
│  ├─ sanctum.php
│  ├─ services.php
│  ├─ session.php
│  └─ view.php
├─ database
│  ├─ .gitignore
│  ├─ factories
│  │  └─ UserFactory.php
│  ├─ migrations
│  │  ├─ 0001_01_01_000000_create_users_table.php
│  │  ├─ 0001_01_01_000001_create_cache_table.php
│  │  ├─ 0001_01_01_000002_create_jobs_table.php
│  │  ├─ 2024_06_12_095553_add_two_factor_columns_to_users_table.php
│  │  ├─ 2024_06_12_095632_create_personal_access_tokens_table.php
│  │  ├─ 2024_06_20_112716_create_property_categories_table.php
│  │  ├─ 2024_06_20_112724_create_property_types_table.php
│  │  ├─ 2024_06_20_112732_create_properties_table.php
│  │  ├─ 2024_06_20_112754_create_property_features_table.php
│  │  ├─ 2024_06_20_112801_create_property_amenities_table.php
│  │  ├─ 2024_06_20_112810_create_property_feature_mappings_table.php
│  │  ├─ 2024_06_20_112817_create_property_amenity_mappings_table.php
│  │  ├─ 2024_06_20_112826_create_surrounding_areas_table.php
│  │  ├─ 2024_06_20_112834_create_property_surrounding_area_mappings_table.php
│  │  ├─ 2024_06_20_112840_create_bookings_table.php
│  │  ├─ 2024_06_20_112846_create_reviews_table.php
│  │  ├─ 2024_06_20_112852_create_messages_table.php
│  │  └─ 2024_06_27_183647_create_property_category_mappings_table.php
│  └─ seeders
│     ├─ AmenityTableSeeder.php
│     ├─ AreaTableSeeder.php
│     ├─ CategoryTableSeeder.php
│     ├─ DatabaseSeeder.php
│     ├─ FeatureTableSeeder.php
│     ├─ TypesTableSeeder.php
│     └─ UsersTableSeeder.php
├─ package-lock.json
├─ package.json
├─ phpunit.xml
├─ postcss.config.js
├─ public
│  ├─ .htaccess
│  ├─ backend
│  │  └─ assets
│  │     ├─ css
│  │     │  ├─ demo1
│  │     │  │  ├─ style-rtl.css
│  │     │  │  ├─ style-rtl.min.css
│  │     │  │  ├─ style.css
│  │     │  │  └─ style.min.css
│  │     │  ├─ demo2
│  │     │  │  ├─ style-rtl.css
│  │     │  │  ├─ style-rtl.min.css
│  │     │  │  ├─ style.css
│  │     │  │  └─ style.min.css
│  │     │  ├─ demo3
│  │     │  │  ├─ style-rtl.css
│  │     │  │  ├─ style-rtl.min.css
│  │     │  │  ├─ style.css
│  │     │  │  └─ style.min.css
│  │     │  ├─ demo4
│  │     │  │  ├─ style-rtl.css
│  │     │  │  ├─ style-rtl.min.css
│  │     │  │  ├─ style.css
│  │     │  │  └─ style.min.css
│  │     │  └─ maps
│  │     │     ├─ demo1
│  │     │     │  └─ style.css.map
│  │     │     ├─ demo2
│  │     │     │  └─ style.css.map
│  │     │     ├─ demo3
│  │     │     │  └─ style.css.map
│  │     │     └─ demo4
│  │     │        └─ style.css.map
│  │     ├─ fonts
│  │     │  └─ feather-font
│  │     │     ├─ .gitignore
│  │     │     ├─ css
│  │     │     │  └─ iconfont.css
│  │     │     ├─ examples
│  │     │     │  ├─ index.css
│  │     │     │  └─ index.html
│  │     │     └─ fonts
│  │     │        ├─ feather.eot
│  │     │        ├─ feather.svg
│  │     │        ├─ feather.ttf
│  │     │        └─ feather.woff
│  │     ├─ images
│  │     │  ├─ favicon.png
│  │     │  ├─ others
│  │     │  │  ├─ 404.svg
│  │     │  │  ├─ logo-placeholder.png
│  │     │  │  └─ placeholder.jpg
│  │     │  └─ screenshots
│  │     │     ├─ dark.jpg
│  │     │     └─ light.jpg
│  │     ├─ js
│  │     │  ├─ ace.js
│  │     │  ├─ apexcharts-dark-rtl.js
│  │     │  ├─ apexcharts-dark.js
│  │     │  ├─ apexcharts-light-rtl.js
│  │     │  ├─ apexcharts-light.js
│  │     │  ├─ bootstrap-maxlength.js
│  │     │  ├─ carousel-rtl.js
│  │     │  ├─ carousel.js
│  │     │  ├─ chartjs-dark.js
│  │     │  ├─ chartjs-light.js
│  │     │  ├─ chat.js
│  │     │  ├─ cropper.js
│  │     │  ├─ dashboard-dark.js
│  │     │  ├─ dashboard-light.js
│  │     │  ├─ data-table.js
│  │     │  ├─ demo.js
│  │     │  ├─ dropify.js
│  │     │  ├─ dropzone.js
│  │     │  ├─ easymde.js
│  │     │  ├─ email.js
│  │     │  ├─ flatpickr.js
│  │     │  ├─ form-validation.js
│  │     │  ├─ fullcalendar.js
│  │     │  ├─ inputmask.js
│  │     │  ├─ jquery.flot-dark.js
│  │     │  ├─ jquery.flot-light.js
│  │     │  ├─ morrisjs-dark.js
│  │     │  ├─ morrisjs-light.js
│  │     │  ├─ peity.js
│  │     │  ├─ pickr.js
│  │     │  ├─ select2.js
│  │     │  ├─ sortablejs-dark.js
│  │     │  ├─ sortablejs-light.js
│  │     │  ├─ sparkline.js
│  │     │  ├─ sweet-alert.js
│  │     │  ├─ tags-input.js
│  │     │  ├─ template.js
│  │     │  ├─ tinymce.js
│  │     │  ├─ typeahead.js
│  │     │  └─ wizard.js
│  │     └─ scss
│  │        ├─ common
│  │        │  ├─ components
│  │        │  │  ├─ email
│  │        │  │  │  └─ _inbox.scss
│  │        │  │  ├─ _auth.scss
│  │        │  │  ├─ _badges.scss
│  │        │  │  ├─ _bootstrap-alert.scss
│  │        │  │  ├─ _breadcrumbs.scss
│  │        │  │  ├─ _buttons.scss
│  │        │  │  ├─ _cards.scss
│  │        │  │  ├─ _chat.scss
│  │        │  │  ├─ _dashboard.scss
│  │        │  │  ├─ _dropdown.scss
│  │        │  │  ├─ _forms.scss
│  │        │  │  ├─ _icons.scss
│  │        │  │  ├─ _nav.scss
│  │        │  │  ├─ _pagination.scss
│  │        │  │  ├─ _tables.scss
│  │        │  │  └─ _timeline.scss
│  │        │  ├─ mixins
│  │        │  │  ├─ _animation.scss
│  │        │  │  ├─ _buttons.scss
│  │        │  │  ├─ _misc.scss
│  │        │  │  └─ _width.scss
│  │        │  ├─ _background.scss
│  │        │  ├─ _demo.scss
│  │        │  ├─ _functions.scss
│  │        │  ├─ _helpers.scss
│  │        │  ├─ _misc.scss
│  │        │  ├─ _reset.scss
│  │        │  ├─ _typography.scss
│  │        │  └─ _utilities.scss
│  │        ├─ demo1
│  │        │  ├─ style.scss
│  │        │  ├─ _layouts.scss
│  │        │  ├─ _navbar.scss
│  │        │  ├─ _sidebar.scss
│  │        │  ├─ _variables.scss
│  │        │  └─ _vertical-wrapper.scss
│  │        ├─ demo2
│  │        │  ├─ style.scss
│  │        │  ├─ _layouts.scss
│  │        │  ├─ _navbar.scss
│  │        │  ├─ _sidebar.scss
│  │        │  ├─ _variables.scss
│  │        │  └─ _vertical-wrapper.scss
│  │        ├─ demo3
│  │        │  ├─ style.scss
│  │        │  ├─ _horizontal-wrapper.scss
│  │        │  ├─ _layouts.scss
│  │        │  ├─ _navbar.scss
│  │        │  └─ _variables.scss
│  │        ├─ demo4
│  │        │  ├─ style.scss
│  │        │  ├─ _horizontal-wrapper.scss
│  │        │  ├─ _layouts.scss
│  │        │  ├─ _navbar.scss
│  │        │  └─ _variables.scss
│  │        ├─ theme-dark
│  │        │  ├─ components
│  │        │  │  └─ plugin-overrides
│  │        │  │     ├─ _ace.scss
│  │        │  │     ├─ _apex-charts.scss
│  │        │  │     ├─ _data-tables.scss
│  │        │  │     ├─ _dropify.scss
│  │        │  │     ├─ _dropzone.scss
│  │        │  │     ├─ _easymde.scss
│  │        │  │     ├─ _flatpickr.scss
│  │        │  │     ├─ _full-calendar.scss
│  │        │  │     ├─ _jquery-flot.scss
│  │        │  │     ├─ _morrisjs.scss
│  │        │  │     ├─ _peity.scss
│  │        │  │     ├─ _perfect-scrollbar.scss
│  │        │  │     ├─ _select2.scss
│  │        │  │     ├─ _sweet-alert.scss
│  │        │  │     ├─ _tags-input.scss
│  │        │  │     ├─ _tinymce.scss
│  │        │  │     ├─ _typeahead.scss
│  │        │  │     └─ _wizard.scss
│  │        │  └─ _variables.scss
│  │        └─ theme-light
│  │           ├─ components
│  │           │  └─ plugin-overrides
│  │           │     ├─ _ace.scss
│  │           │     ├─ _apex-charts.scss
│  │           │     ├─ _data-tables.scss
│  │           │     ├─ _dropify.scss
│  │           │     ├─ _dropzone.scss
│  │           │     ├─ _easymde.scss
│  │           │     ├─ _flatpickr.scss
│  │           │     ├─ _full-calendar.scss
│  │           │     ├─ _jquery-flot.scss
│  │           │     ├─ _morrisjs.scss
│  │           │     ├─ _peity.scss
│  │           │     ├─ _perfect-scrollbar.scss
│  │           │     ├─ _select2.scss
│  │           │     ├─ _sweet-alert.scss
│  │           │     ├─ _tags-input.scss
│  │           │     ├─ _tinymce.scss
│  │           │     ├─ _typeahead.scss
│  │           │     └─ _wizard.scss
│  │           └─ _variables.scss
│  ├─ background
│  │  ├─ script.js
│  │  └─ style.css
│  ├─ contact
│  │  ├─ css
│  │  │  ├─ .DS_Store
│  │  │  ├─ animate.css
│  │  │  ├─ bootstrap
│  │  │  │  ├─ .DS_Store
│  │  │  │  ├─ mixins
│  │  │  │  │  ├─ .DS_Store
│  │  │  │  │  ├─ _border-radius.css
│  │  │  │  │  ├─ _breakpoints.css
│  │  │  │  │  ├─ _screen-reader.css
│  │  │  │  │  └─ _visibility.css
│  │  │  │  ├─ utilities
│  │  │  │  │  └─ _stretched-link.css
│  │  │  │  └─ _media.css
│  │  │  ├─ bootstrap.min.css
│  │  │  └─ style.css
│  │  ├─ fonts
│  │  │  └─ .DS_Store
│  │  ├─ images
│  │  │  ├─ .DS_Store
│  │  │  └─ bg_1.jpg
│  │  ├─ js
│  │  │  ├─ .DS_Store
│  │  │  ├─ bootstrap.min.js
│  │  │  ├─ jquery.min.js
│  │  │  ├─ jquery.validate.min.js
│  │  │  ├─ main.js
│  │  │  └─ popper.js
│  │  └─ scss
│  │     ├─ .DS_Store
│  │     ├─ bootstrap
│  │     │  ├─ .DS_Store
│  │     │  ├─ bootstrap-grid.scss
│  │     │  ├─ bootstrap-reboot.scss
│  │     │  ├─ bootstrap.scss
│  │     │  ├─ mixins
│  │     │  │  ├─ _alert.scss
│  │     │  │  ├─ _background-variant.scss
│  │     │  │  ├─ _badge.scss
│  │     │  │  ├─ _border-radius.scss
│  │     │  │  ├─ _box-shadow.scss
│  │     │  │  ├─ _breakpoints.scss
│  │     │  │  ├─ _buttons.scss
│  │     │  │  ├─ _caret.scss
│  │     │  │  ├─ _clearfix.scss
│  │     │  │  ├─ _deprecate.scss
│  │     │  │  ├─ _float.scss
│  │     │  │  ├─ _forms.scss
│  │     │  │  ├─ _gradients.scss
│  │     │  │  ├─ _grid-framework.scss
│  │     │  │  ├─ _grid.scss
│  │     │  │  ├─ _hover.scss
│  │     │  │  ├─ _image.scss
│  │     │  │  ├─ _list-group.scss
│  │     │  │  ├─ _lists.scss
│  │     │  │  ├─ _nav-divider.scss
│  │     │  │  ├─ _pagination.scss
│  │     │  │  ├─ _reset-text.scss
│  │     │  │  ├─ _resize.scss
│  │     │  │  ├─ _screen-reader.scss
│  │     │  │  ├─ _size.scss
│  │     │  │  ├─ _table-row.scss
│  │     │  │  ├─ _text-emphasis.scss
│  │     │  │  ├─ _text-hide.scss
│  │     │  │  ├─ _text-truncate.scss
│  │     │  │  ├─ _transition.scss
│  │     │  │  └─ _visibility.scss
│  │     │  ├─ utilities
│  │     │  │  ├─ _align.scss
│  │     │  │  ├─ _background.scss
│  │     │  │  ├─ _borders.scss
│  │     │  │  ├─ _clearfix.scss
│  │     │  │  ├─ _display.scss
│  │     │  │  ├─ _embed.scss
│  │     │  │  ├─ _flex.scss
│  │     │  │  ├─ _float.scss
│  │     │  │  ├─ _overflow.scss
│  │     │  │  ├─ _position.scss
│  │     │  │  ├─ _screenreaders.scss
│  │     │  │  ├─ _shadows.scss
│  │     │  │  ├─ _sizing.scss
│  │     │  │  ├─ _spacing.scss
│  │     │  │  ├─ _stretched-link.scss
│  │     │  │  ├─ _text.scss
│  │     │  │  └─ _visibility.scss
│  │     │  ├─ _alert.scss
│  │     │  ├─ _badge.scss
│  │     │  ├─ _breadcrumb.scss
│  │     │  ├─ _button-group.scss
│  │     │  ├─ _buttons.scss
│  │     │  ├─ _card.scss
│  │     │  ├─ _carousel.scss
│  │     │  ├─ _close.scss
│  │     │  ├─ _code.scss
│  │     │  ├─ _custom-forms.scss
│  │     │  ├─ _dropdown.scss
│  │     │  ├─ _forms.scss
│  │     │  ├─ _functions.scss
│  │     │  ├─ _grid.scss
│  │     │  ├─ _images.scss
│  │     │  ├─ _input-group.scss
│  │     │  ├─ _jumbotron.scss
│  │     │  ├─ _list-group.scss
│  │     │  ├─ _media.scss
│  │     │  ├─ _mixins.scss
│  │     │  ├─ _modal.scss
│  │     │  ├─ _nav.scss
│  │     │  ├─ _navbar.scss
│  │     │  ├─ _pagination.scss
│  │     │  ├─ _popover.scss
│  │     │  ├─ _print.scss
│  │     │  ├─ _progress.scss
│  │     │  ├─ _reboot.scss
│  │     │  ├─ _root.scss
│  │     │  ├─ _spinners.scss
│  │     │  ├─ _tables.scss
│  │     │  ├─ _toasts.scss
│  │     │  ├─ _tooltip.scss
│  │     │  ├─ _transitions.scss
│  │     │  ├─ _type.scss
│  │     │  ├─ _utilities.scss
│  │     │  └─ _variables.scss
│  │     └─ style.scss
│  ├─ favicon.ico
│  ├─ form
│  │  ├─ css
│  │  │  ├─ bootstrap.min.css
│  │  │  ├─ fonts.css
│  │  │  ├─ img
│  │  │  │  ├─ A1.jpg
│  │  │  │  ├─ A2.jpg
│  │  │  │  ├─ A3.jpg
│  │  │  │  ├─ A4.jpg
│  │  │  │  └─ A5.jpg
│  │  │  └─ style.css
│  │  ├─ js
│  │  │  ├─ bootstrap.min.js
│  │  │  ├─ index.js
│  │  │  └─ jquery.min.js
│  │  └─ sass
│  │     └─ style.sass
│  ├─ Front
│  │  ├─ css
│  │  │  └─ style.css
│  │  ├─ img
│  │  │  ├─ A1.png
│  │  │  ├─ A2.png
│  │  │  ├─ A3.png
│  │  │  ├─ A4.png
│  │  │  ├─ A5.png
│  │  │  ├─ about1.jpg
│  │  │  ├─ about2.jpg
│  │  │  ├─ f1.png
│  │  │  ├─ f2.png
│  │  │  ├─ f3.png
│  │  │  ├─ f4.png
│  │  │  ├─ f5.png
│  │  │  ├─ Group 1.png
│  │  │  ├─ hero.png
│  │  │  ├─ logo.PNG
│  │  │  ├─ p1.png
│  │  │  ├─ p2.png
│  │  │  ├─ p3.png
│  │  │  └─ ss.jpg
│  │  └─ js
│  │     └─ script.js
│  ├─ img
│  │  ├─ icons8-accomodation-64.png
│  │  ├─ icons8-accomodation-lineal-color-16.png
│  │  ├─ icons8-accomodation-lineal-color-32.png
│  │  ├─ icons8-accomodation-lineal-color-96.png
│  │  ├─ loader.gif
│  │  ├─ loader2.gif
│  │  └─ logo.png
│  ├─ index.php
│  ├─ js
│  │  └─ app.js
│  ├─ mix-manifest.json
│  ├─ modal
│  │  ├─ css
│  │  │  ├─ .DS_Store
│  │  │  ├─ bootstrap
│  │  │  │  ├─ .DS_Store
│  │  │  │  ├─ mixins
│  │  │  │  │  ├─ .DS_Store
│  │  │  │  │  ├─ _pagination.css
│  │  │  │  │  ├─ _transition.css
│  │  │  │  │  └─ _visibility.css
│  │  │  │  └─ _media.css
│  │  │  ├─ bootstrap.min.css
│  │  │  ├─ flaticon.css
│  │  │  ├─ ionicons.min.css
│  │  │  └─ style.css
│  │  ├─ fonts
│  │  │  ├─ .DS_Store
│  │  │  ├─ flaticon
│  │  │  │  ├─ .DS_Store
│  │  │  │  ├─ backup.txt
│  │  │  │  ├─ font
│  │  │  │  │  ├─ flaticon.css
│  │  │  │  │  ├─ Flaticon.eot
│  │  │  │  │  ├─ flaticon.html
│  │  │  │  │  ├─ Flaticon.svg
│  │  │  │  │  ├─ Flaticon.ttf
│  │  │  │  │  ├─ Flaticon.woff
│  │  │  │  │  ├─ Flaticon.woff2
│  │  │  │  │  ├─ _flaticon.css
│  │  │  │  │  └─ _flaticon.scss
│  │  │  │  └─ license
│  │  │  │     └─ license.pdf
│  │  │  └─ ionicons
│  │  │     ├─ css
│  │  │     │  ├─ ionicons.min.css
│  │  │     │  └─ _ionicons.scss
│  │  │     └─ fonts
│  │  │        ├─ .DS_Store
│  │  │        ├─ ionicons.eot
│  │  │        ├─ ionicons.svg
│  │  │        ├─ ionicons.ttf
│  │  │        ├─ ionicons.woff
│  │  │        └─ ionicons.woff2
│  │  ├─ images
│  │  │  ├─ .DS_Store
│  │  │  └─ bg-1.jpg
│  │  ├─ js
│  │  │  ├─ .DS_Store
│  │  │  ├─ bootstrap.min.js
│  │  │  ├─ jquery.min.js
│  │  │  ├─ main.js
│  │  │  └─ popper.js
│  │  └─ scss
│  │     ├─ .DS_Store
│  │     ├─ bootstrap
│  │     │  ├─ .DS_Store
│  │     │  ├─ bootstrap-grid.scss
│  │     │  ├─ bootstrap-reboot.scss
│  │     │  ├─ bootstrap.scss
│  │     │  ├─ mixins
│  │     │  │  ├─ _alert.scss
│  │     │  │  ├─ _background-variant.scss
│  │     │  │  ├─ _badge.scss
│  │     │  │  ├─ _border-radius.scss
│  │     │  │  ├─ _box-shadow.scss
│  │     │  │  ├─ _breakpoints.scss
│  │     │  │  ├─ _buttons.scss
│  │     │  │  ├─ _caret.scss
│  │     │  │  ├─ _clearfix.scss
│  │     │  │  ├─ _deprecate.scss
│  │     │  │  ├─ _float.scss
│  │     │  │  ├─ _forms.scss
│  │     │  │  ├─ _gradients.scss
│  │     │  │  ├─ _grid-framework.scss
│  │     │  │  ├─ _grid.scss
│  │     │  │  ├─ _hover.scss
│  │     │  │  ├─ _image.scss
│  │     │  │  ├─ _list-group.scss
│  │     │  │  ├─ _lists.scss
│  │     │  │  ├─ _nav-divider.scss
│  │     │  │  ├─ _pagination.scss
│  │     │  │  ├─ _reset-text.scss
│  │     │  │  ├─ _resize.scss
│  │     │  │  ├─ _screen-reader.scss
│  │     │  │  ├─ _size.scss
│  │     │  │  ├─ _table-row.scss
│  │     │  │  ├─ _text-emphasis.scss
│  │     │  │  ├─ _text-hide.scss
│  │     │  │  ├─ _text-truncate.scss
│  │     │  │  ├─ _transition.scss
│  │     │  │  └─ _visibility.scss
│  │     │  ├─ utilities
│  │     │  │  ├─ _align.scss
│  │     │  │  ├─ _background.scss
│  │     │  │  ├─ _borders.scss
│  │     │  │  ├─ _clearfix.scss
│  │     │  │  ├─ _display.scss
│  │     │  │  ├─ _embed.scss
│  │     │  │  ├─ _flex.scss
│  │     │  │  ├─ _float.scss
│  │     │  │  ├─ _overflow.scss
│  │     │  │  ├─ _position.scss
│  │     │  │  ├─ _screenreaders.scss
│  │     │  │  ├─ _shadows.scss
│  │     │  │  ├─ _sizing.scss
│  │     │  │  ├─ _spacing.scss
│  │     │  │  ├─ _stretched-link.scss
│  │     │  │  ├─ _text.scss
│  │     │  │  └─ _visibility.scss
│  │     │  ├─ _alert.scss
│  │     │  ├─ _badge.scss
│  │     │  ├─ _breadcrumb.scss
│  │     │  ├─ _button-group.scss
│  │     │  ├─ _buttons.scss
│  │     │  ├─ _card.scss
│  │     │  ├─ _carousel.scss
│  │     │  ├─ _close.scss
│  │     │  ├─ _code.scss
│  │     │  ├─ _custom-forms.scss
│  │     │  ├─ _dropdown.scss
│  │     │  ├─ _forms.scss
│  │     │  ├─ _functions.scss
│  │     │  ├─ _grid.scss
│  │     │  ├─ _images.scss
│  │     │  ├─ _input-group.scss
│  │     │  ├─ _jumbotron.scss
│  │     │  ├─ _list-group.scss
│  │     │  ├─ _media.scss
│  │     │  ├─ _mixins.scss
│  │     │  ├─ _modal.scss
│  │     │  ├─ _nav.scss
│  │     │  ├─ _navbar.scss
│  │     │  ├─ _pagination.scss
│  │     │  ├─ _popover.scss
│  │     │  ├─ _print.scss
│  │     │  ├─ _progress.scss
│  │     │  ├─ _reboot.scss
│  │     │  ├─ _root.scss
│  │     │  ├─ _spinners.scss
│  │     │  ├─ _tables.scss
│  │     │  ├─ _toasts.scss
│  │     │  ├─ _tooltip.scss
│  │     │  ├─ _transitions.scss
│  │     │  ├─ _type.scss
│  │     │  ├─ _utilities.scss
│  │     │  └─ _variables.scss
│  │     └─ style.scss
│  ├─ registerForm
│  │  ├─ css
│  │  │  └─ main.css
│  │  └─ js
│  │     └─ global.js
│  ├─ robots.txt
│  ├─ upload
│  │  ├─ img
│  │  │  └─ no_image.jpg
│  │  └─ login.png
│  └─ view
│     ├─ about.html
│     ├─ agent-single.html
│     ├─ agents-grid.html
│     ├─ blog-grid.html
│     ├─ blog-single.html
│     ├─ contact.html
│     ├─ css
│     │  └─ style.css
│     ├─ img
│     │  ├─ about-1.jpg
│     │  ├─ about-2.jpg
│     │  ├─ agent-1.jpg
│     │  ├─ agent-2.jpg
│     │  ├─ agent-3.jpg
│     │  ├─ agent-4.jpg
│     │  ├─ agent-5.jpg
│     │  ├─ agent-6.jpg
│     │  ├─ agent-7.jpg
│     │  ├─ apple-touch-icon.png
│     │  ├─ author-1.jpg
│     │  ├─ author-2.jpg
│     │  ├─ favicon.png
│     │  ├─ mini-testimonial-1.jpg
│     │  ├─ mini-testimonial-2.jpg
│     │  ├─ plan2.jpg
│     │  ├─ post-1.jpg
│     │  ├─ post-2.jpg
│     │  ├─ post-3.jpg
│     │  ├─ post-4.jpg
│     │  ├─ post-5.jpg
│     │  ├─ post-6.jpg
│     │  ├─ post-7.jpg
│     │  ├─ post-single-1.jpg
│     │  ├─ post-single-2.jpg
│     │  ├─ property-1.jpg
│     │  ├─ property-10.jpg
│     │  ├─ property-2.jpg
│     │  ├─ property-3.jpg
│     │  ├─ property-4.jpg
│     │  ├─ property-5.jpg
│     │  ├─ property-6.jpg
│     │  ├─ property-7.jpg
│     │  ├─ property-8.jpg
│     │  ├─ property-9.jpg
│     │  ├─ slide-1.jpg
│     │  ├─ slide-2.jpg
│     │  ├─ slide-3.jpg
│     │  ├─ slide-about-1.jpg
│     │  ├─ testimonial-1.jpg
│     │  └─ testimonial-2.jpg
│     ├─ index.html
│     ├─ js
│     │  └─ main.js
│     ├─ property-grid.html
│     ├─ property-single.html
│     └─ scss
│        └─ Readme.txt
├─ README.md
├─ resources
│  ├─ css
│  │  └─ app.css
│  ├─ js
│  │  ├─ app.js
│  │  └─ bootstrap.js
│  ├─ markdown
│  │  ├─ policy.md
│  │  └─ terms.md
│  └─ views
│     ├─ admin
│     │  ├─ dashboard.blade.php
│     │  ├─ Mylistings.blade.php
│     │  ├─ navBar.blade.php
│     │  ├─ profile.blade.php
│     │  └─ sidebar.blade.php
│     ├─ agent
│     │  ├─ dashboard.blade.php
│     │  ├─ Mylistings.blade.php
│     │  ├─ navBar.blade.php
│     │  ├─ profile.blade.php
│     │  └─ sidebar.blade.php
│     ├─ api
│     │  ├─ api-token-manager.blade.php
│     │  └─ index.blade.php
│     ├─ auth
│     │  ├─ agent.blade.php
│     │  ├─ confirm-password.blade.php
│     │  ├─ forgot-password.blade.php
│     │  ├─ login.blade.php
│     │  ├─ register.blade.php
│     │  ├─ reset-password.blade.php
│     │  ├─ two-factor-challenge.blade.php
│     │  └─ verify-email.blade.php
│     ├─ components
│     │  ├─ action-message.blade.php
│     │  ├─ action-section.blade.php
│     │  ├─ application-logo.blade.php
│     │  ├─ application-mark.blade.php
│     │  ├─ authentication-card-logo.blade.php
│     │  ├─ authentication-card.blade.php
│     │  ├─ banner.blade.php
│     │  ├─ button.blade.php
│     │  ├─ checkbox.blade.php
│     │  ├─ confirmation-modal.blade.php
│     │  ├─ confirms-password.blade.php
│     │  ├─ danger-button.blade.php
│     │  ├─ dialog-modal.blade.php
│     │  ├─ dropdown-link.blade.php
│     │  ├─ dropdown.blade.php
│     │  ├─ form-section.blade.php
│     │  ├─ input-error.blade.php
│     │  ├─ input.blade.php
│     │  ├─ label.blade.php
│     │  ├─ modal.blade.php
│     │  ├─ nav-link.blade.php
│     │  ├─ responsive-nav-link.blade.php
│     │  ├─ secondary-button.blade.php
│     │  ├─ section-border.blade.php
│     │  ├─ section-title.blade.php
│     │  ├─ switchable-team.blade.php
│     │  ├─ validation-errors.blade.php
│     │  └─ welcome.blade.php
│     ├─ emails
│     │  └─ team-invitation.blade.php
│     ├─ errors
│     │  ├─ 403.blade.php
│     │  ├─ 500.blade.php
│     │  └─ show.blade.php
│     ├─ header.blade.php
│     ├─ home.blade.php
│     ├─ layouts
│     │  ├─ app.blade.php
│     │  ├─ Dashpreloader.blade.php
│     │  ├─ guest.blade.php
│     │  └─ preloader.blade.php
│     ├─ listings
│     │  ├─ amenities.blade.php
│     │  ├─ approved.blade.php
│     │  ├─ categories.blade.php
│     │  ├─ features.blade.php
│     │  ├─ pending.blade.php
│     │  ├─ surroundings.blade.php
│     │  └─ types.blade.php
│     ├─ navigation-menu.blade.php
│     ├─ pages
│     │  ├─ aboutUs.blade.php
│     │  ├─ add.blade.php
│     │  ├─ contactUs.blade.php
│     │  ├─ listings.blade.php
│     │  ├─ show.blade.php
│     │  └─ test.blade.php
│     ├─ policy.blade.php
│     ├─ profile
│     │  ├─ delete-user-form.blade.php
│     │  ├─ logout-other-browser-sessions-form.blade.php
│     │  ├─ two-factor-authentication-form.blade.php
│     │  ├─ update-password-form.blade.php
│     │  └─ update-profile-information-form.blade.php
│     ├─ terms.blade.php
│     ├─ user
│     │  ├─ dashboard.blade.php
│     │  ├─ navBar.blade.php
│     │  ├─ profile.blade.php
│     │  └─ sidebar.blade.php
│     └─ users
│        ├─ Admins.blade.php
│        ├─ Agents.blade.php
│        ├─ index.blade.php
│        ├─ Students.blade.php
│        └─ verification.blade.php
├─ routes
│  ├─ api.php
│  ├─ channels.php
│  ├─ console.php
│  └─ web.php
├─ storage
│  ├─ app
│  │  ├─ .gitignore
│  │  └─ public
│  │     └─ .gitignore
│  ├─ framework
│  │  ├─ .gitignore
│  │  ├─ cache
│  │  │  ├─ .gitignore
│  │  │  └─ data
│  │  │     └─ .gitignore
│  │  ├─ sessions
│  │  │  └─ .gitignore
│  │  ├─ testing
│  │  │  └─ .gitignore
│  │  └─ views
│  │     ├─ .gitignore
│  │     ├─ 0a9c5027b0cc459d6be58b474040f1e6.php
│  │     ├─ 286e333516271b2dabc7482a9873f8d9.php
│  │     ├─ 3b071e9b4d8d9cc46f913eb9ea588901.php
│  │     ├─ 3b6f2e1ebd2a6012d25b628679080457.php
│  │     ├─ 3bdeab1044e9211e2ced6f5fa1371916.php
│  │     ├─ 5c33e51ba1fd84dca1c18a7ebd1732f0.php
│  │     ├─ 61c328270d29be5a060834de9550d37c.php
│  │     ├─ 6e19df9adab32f4c581495d51506f0ba.php
│  │     ├─ 73fe7d7fec161ea8e1feddbf81f13c64.php
│  │     ├─ 85f754547b6fec73ad4504c399725e7d.php
│  │     ├─ 98b6f02c83dda9980aeb3b26683d519c.php
│  │     ├─ 9bb2bf125c3e5d892a7eefb12f40cf05.php
│  │     ├─ a578af78ce7b3476c190b5f2039a53ad.php
│  │     ├─ ac097039b932afbc04c25b4037ca5525.php
│  │     ├─ ad9a7438979bf7252037c0b4fb2a2219.php
│  │     ├─ c2f8635aa7d843292f59d9a9ea29d494.php
│  │     ├─ ccdc35377c37820e5610645985147e4f.php
│  │     ├─ dd2ffaae74b10739719222d84b7385b1.php
│  │     ├─ e541e0e23f5f1f1a8edd002ba58ab793.php
│  │     └─ f757f2d441a6c2c7a20df3c88238c922.php
│  └─ logs
│     ├─ .gitignore
│     └─ laravel.log
├─ tailwind.config.js
├─ tests
│  ├─ Feature
│  │  ├─ ApiTokenPermissionsTest.php
│  │  ├─ AuthenticationTest.php
│  │  ├─ BrowserSessionsTest.php
│  │  ├─ CreateApiTokenTest.php
│  │  ├─ DeleteAccountTest.php
│  │  ├─ DeleteApiTokenTest.php
│  │  ├─ EmailVerificationTest.php
│  │  ├─ ExampleTest.php
│  │  ├─ PasswordConfirmationTest.php
│  │  ├─ PasswordResetTest.php
│  │  ├─ ProfileInformationTest.php
│  │  ├─ RegistrationTest.php
│  │  ├─ TwoFactorAuthenticationSettingsTest.php
│  │  └─ UpdatePasswordTest.php
│  ├─ TestCase.php
│  └─ Unit
│     └─ ExampleTest.php
└─ vite.config.js

```