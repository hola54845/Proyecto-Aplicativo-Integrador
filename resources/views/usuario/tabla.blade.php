<!doctype html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>AdminLTE 4 | Data Tables</title>

  <!--begin::Theme Init (prevents flash of incorrect theme on load, #6043)-->
  <script>
    (() => {
      'use strict';
      const root = document.documentElement;

      // Applications with their own theming opt out of AdminLTE's color mode
      // entirely, here as well as in the bundle.
      if (root.getAttribute('data-lte-color-mode') === 'off') {
        return;
      }

      const STORAGE_KEY = 'lte-theme';
      let stored = null;
      try {
        stored = localStorage.getItem(STORAGE_KEY);
      } catch {
        // localStorage may be unavailable (private mode, sandboxed iframe).
      }
      // Mirror the precedence in color-mode.ts: the visitor's stored choice
      // wins, then a theme this page declared itself, then the OS preference.
      const authored = root.getAttribute('data-bs-theme');
      let resolved = 'light';
      if (stored === 'dark' || stored === 'light') {
        resolved = stored;
      } else if (authored === 'dark' || authored === 'light') {
        resolved = authored;
      } else if (globalThis.matchMedia('(prefers-color-scheme: dark)').matches) {
        resolved = 'dark';
      }
      root.setAttribute('data-bs-theme', resolved);
      root.style.colorScheme = resolved;
      // Flag values computed here, so the bundle does not mistake them for a
      // theme the page declared and stop following the OS preference.
      if (resolved !== authored) {
        root.setAttribute('data-lte-theme-resolved', '');
      }
    })();
  </script>
  <!--end::Theme Init-->

  <!--begin::Accessibility Meta Tags-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
  <meta name="color-scheme" content="light dark" />
  <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
  <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
  <!--end::Accessibility Meta Tags-->

  <!--begin::Primary Meta Tags-->
  <meta name="title" content="AdminLTE 4 | Data Tables" />
  <meta name="author" content="ColorlibHQ" />
  <meta
    name="description"
    content="AdminLTE is a free Bootstrap 5 admin dashboard template with almost 50 example pages, built with vanilla JS and designed with accessibility in mind." />
  <meta
    name="keywords"
    content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel" />
  <!--end::Primary Meta Tags-->

  <!--begin::Accessibility Features-->
  <!-- Skip links will be dynamically added by accessibility.js -->
  <meta name="supported-color-schemes" content="light dark" />
  <link rel="preload" href="../css/adminlte.css" as="style" />
  <!--end::Accessibility Features-->

  <!--begin::Fonts-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
    crossorigin="anonymous"
    media="print"
    onload="this.media = 'all'" />
  <!--end::Fonts-->

  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
    crossorigin="anonymous" />
  <!--end::Third Party Plugin(OverlayScrollbars)-->

  <!--begin::Third Party Plugin(Bootstrap Icons)-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    crossorigin="anonymous" />
  <!--end::Third Party Plugin(Bootstrap Icons)-->

  <!--begin::Required Plugin(AdminLTE)-->
  <link rel="stylesheet" href="../css/adminlte.css" />
  <!--end::Required Plugin(AdminLTE)-->

  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/tabulator-tables@6.4.0/dist/css/tabulator_bootstrap5.min.css"
    crossorigin="anonymous" />
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
  <div class="app-wrapper">
    <!--begin::Header-->

    <!--begin::Container-->
    <div class="container-fluid">


      <!--begin::End Navbar Links-->
      <ul class="navbar-nav ms-auto">
        <!--begin::Search (small screens: the field above is hidden, so link to the search page)-->
        <li class="nav-item d-md-none">
          <a class="nav-link" href="../pages/search-results.html" aria-label="Search">
            <i class="bi bi-search" aria-hidden="true"></i>
          </a>
        </li>

      </ul>
      <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
    </nav>
    <!--end::Header-->
    <!--begin::Sidebar-->

    <!--end::Sidebar-->
    <main class="app-main">
      <div class="app-content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1 class="mb-0 fs-3">Data Tables</h1>
            </div>

          </div>
        </div>
      </div>
      <div class="app-content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Users</h3>
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 16rem">
                  <span class="input-group-text">
                    <i class="bi bi-search" aria-hidden="true"></i>
                  </span>
                  <input
                    id="table-filter"
                    type="search"
                    class="form-control"
                    placeholder="Filter rows&hellip;"
                    aria-label="Filter rows" />
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex gap-2 mb-3">
                <button id="export-csv" type="button" class="btn btn-sm btn-outline-secondary">
                  <i class="bi bi-filetype-csv me-1" aria-hidden="true"></i>
                  Export CSV
                </button>
                <button id="export-json" type="button" class="btn btn-sm btn-outline-secondary">
                  <i class="bi bi-filetype-json me-1" aria-hidden="true"></i>
                  Export JSON
                </button>
                <button id="print-table" type="button" class="btn btn-sm btn-outline-secondary">
                  <i class="bi bi-printer me-1" aria-hidden="true"></i>
                  Print
                </button>
              </div>
              <div id="users-table"></div>
            </div>
            <div class="card-footer text-secondary small">
              Powered by
              <a href="https://tabulator.info/" target="_blank" rel="noopener">Tabulator</a>
              &mdash; vanilla JS, no jQuery required.
            </div>
          </div>
        </div>
      </div>
    </main>
    <!--begin::Footer-->

    <!--end::Footer-->
  </div>
  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <script
    src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
    crossorigin="anonymous"></script>
  <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    crossorigin="anonymous"></script>
  <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
    crossorigin="anonymous"></script>
  <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
  <script src="../js/adminlte.js"></script>
  <!--end::Required Plugin(AdminLTE)-->
  <!--begin::OverlayScrollbars Configure-->
  <script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
      scrollbarTheme: 'os-theme-light',
      scrollbarAutoHide: 'leave',
      scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function() {
      const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

      // Disable OverlayScrollbars on mobile devices to prevent touch interference
      const isMobile = window.innerWidth <= 992;

      if (
        sidebarWrapper &&
        OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
        !isMobile
      ) {
        OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
          scrollbars: {
            theme: Default.scrollbarTheme,
            autoHide: Default.scrollbarAutoHide,
            clickScroll: Default.scrollbarClickScroll,
          },
        });
      }
    });
  </script>
  <!--end::OverlayScrollbars Configure-->

  <!--begin::Color Mode Toggle-->
  <!-- The light/dark/auto switcher ships in adminlte.js as the ColorMode
     module (since 4.1) — no page script needed. Only the no-flash snippet
     in <head> stays inline, because it must run before first paint. -->
  <!--end::Color Mode Toggle-->

  <script
    src="https://cdn.jsdelivr.net/npm/tabulator-tables@6.4.0/dist/js/tabulator.min.js"
    crossorigin="anonymous"></script>
  <script>
    const statusBadge = (cell) => {
      const value = cell.getValue();
      const map = {
        Active: 'success',
        Invited: 'info',
        Suspended: 'secondary'
      };
      const color = map[value] || 'secondary';
      return `<span class="badge text-bg-${color}">${value}</span>`;
    };


    document.addEventListener('DOMContentLoaded', () => {
      const data3 = @json($usuarios);
      console.log(data3);
      const data = [{
        id: 1,
        name: 'Olivia Bennett',
        email: 'olivia@example.com',
        role: 'Admin',
        status: 'Active',
        joined: '2024-03-12',
        password: 'qwrrytr'
      }, ];

      const table = new Tabulator('#users-table', {
        data: data3,
        layout: 'fitColumns',
        pagination: true,
        paginationSize: 10,
        paginationSizeSelector: [10, 25, 50, 100],
        movableColumns: true,
        columns: [{
            title: '#',
            field: 'id',
            width: 60,
            headerSort: true
          },
          {
            title: 'Nombre',
            field: 'nombre',
            headerFilter: 'input'
          },
          {
            title: 'Email',
            field: 'email',
            headerFilter: 'input'
          },
          {
            title: 'Password',
            field: 'password',
            headerFilter: 'input'
          },
          {
            title: "Acciones",
            formatter: (cell) => {
                const id = cell.getRow().getData().id;

                const url = "{{ route('usuario.editar', ':id') }}".replace(':id', id);
                const urldelete = "{{ route('usuario.destroy', ':id') }}".replace(':id', id);

                return `

                    <button type="button" class="btn btn-outline-secondary"
                            onclick="window.location.href='${url}'">
                        <i class="bi bi-pencil"></i>
                    </button>
                     <form action="${urldelete}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                    
                            <button type="submit" class="btn btn-outline-danger" data-bs-toggle="modal" 
                                          data-bs-target="#modal-delete-user"
                                          aria-label="Delete Sarah Bullock">
                                          <i class="bi bi-trash" aria-hidden="true"> </i>
                              </button>
                      </form>      
                `;
            },
            cellClick: function(e, cell) {
              const usuario = cell.getRow().getData();

              if (e.target.classList.contains("btn-editar")) {
                editarUsuario(usuario);
              }

              if (e.target.classList.contains("btn-eliminar")) {
                eliminarUsuario(usuario.id);
              }
            }
          }

        ],
      });

      document.getElementById('table-filter').addEventListener('input', (e) => {
        const value = e.target.value;
        if (value) {
          table.setFilter([
            [{
                field: 'nombre',
                type: 'like',
                value: value
              },
              {
                field: 'email',
                type: 'like',
                value: value
              },
            ],
          ]);
        } else {
          table.clearFilter();
        }
      });

      document
        .getElementById('export-csv')
        .addEventListener('click', () => table.download('csv', 'users.csv'));
      document
        .getElementById('export-json')
        .addEventListener('click', () => table.download('json', 'users.json'));
      document
        .getElementById('print-table')
        .addEventListener('click', () => table.print(false, true));
    });
  </script>
</body>

</html>