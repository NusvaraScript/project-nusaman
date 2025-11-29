// loading
console.log('component.js loaded — ' + new Date().toISOString());
class Tloading extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
            <div id="loading">
                <div class="spinner"></div>
            </div>
        `;
    }
}
customElements.define("t-loading", Tloading);
// header
class Tnavbar extends HTMLElement {
    connectedCallback() {
        const active = this.getAttribute('active') || '';
        const aClass = (name) => (active === name ? 'nav-link px-2 link-secondary' : 'nav-link px-2 text-white');
        this.innerHTML = `
            <header class="d-flex flex-wrap sticky-top align-items-center justify-content-center justify-content-md-between py-3 px-3" style="background-color: #0D1B2A;">
                <div class="col-md-3 mb-2 mb-md-0">
                    <a href="/" class="d-inline-flex align-items-center text-decoration-none">
                        <img src="../foto/logo.png" alt="logo" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                        <h3 class="ms-2 text-white">Nusaman Tech</h3>
                    </a> 
                </div>
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.html" class="${aClass('class-beranda')} text-white px-2">Beranda</a></li>
                    <li><a href="about.html" class="${aClass('class-tentang')} text-white px-2">Tentang</a></li>
                    <li><a href="service.html" class="${aClass('class-layanan')} text-white px-2">Layanan</a></li>
                    <li><a href="project.html" class="${aClass('class-projek')} text-white px-2">Projek</a></li>
                    <li><a href="tool.html" class="${aClass('class-alat')} text-white px-2">Alat & Teknologi</a></li>
                    <li><a href="contact.html" class="${aClass('class-kontak')} text-white px-2">Kontak</a></li>
                </ul>
                <div class="col-md-3 text-end">
                    <a href="#" class="btn btn-outline-light me-2">Login</a> 
                    <a href="#" class="btn text-white" style="background-color: #264b74ff;">Sign-up</a> 
                </div>
            </header>
        `;
    }
}
customElements.define("t-nav", Tnavbar);
// hero section
class Thero extends HTMLElement {
    connectedCallback() {
        const title = this.getAttribute('title') || '';
        const description = this.getAttribute('description') || '';
        const kode = this.getAttribute('kode') || '';
        this.innerHTML = `
            <section class="container-flex" style="background-color: #1B263B;">
                <div class="px-5 py-5 text-center">
                    <h1 class="text-white pb-2" style="font-size: 50px;">${title}</h1>
                    <p class="text-white" style="font-size: 20px;">${description}</p>
                    ${kode}
                </div>
            </section>
        `;
    }
}
customElements.define("t-hero", Thero);
// card
class Tcard extends HTMLElement {
    connectedCallback() {
        const cardClass = this.getAttribute('cardClass') || '';
        const biClass = this.getAttribute('biClass') || '';
        const title = this.getAttribute('title') || '';
        const description = this.getAttribute('description') || '';
        this.innerHTML = `
            <div class="container">
                <div class="row justify-content-center">
                    <div class="card h-100 shadow-sm ${cardClass}" style="padding: 30px; border: none;">
                        <div class="p-2 bg-light rounded-3 mb-3 d-inline-flex">
                            <i class="bi bi-${biClass} fs-3 text-primary"></i>
                        </div>
                        <h2 style="font-size: 1.75rem;">${title}</h2>
                        <p style="font-size:1.1rem;">${description}</p>
                    </div>
                </div>
            </div>
        `;
    }
}
customElements.define("t-card", Tcard);
// cta
class Tcta extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
            <section class="container-flex" style="background-color: #1B263B;">
                <div class="px-2 py-5 text-center">
                    <h1 class="text-white">Tunggu Apa Lagi?</h1>
                    <p class="text-white">Pesan website sesuai dengan tema yang kamu inginkan, dapat dibatalkan kapan saja.
                    </p>
                    <a href="#form-pendaftaran" class="btn text-white" style="background-color: #354a72;">Pesan Sekarang!</a>
                </div>
            </section>
        `;
    }
}
customElements.define('t-cta', Tcta);
// section
class TSection extends HTMLElement {
  connectedCallback() {
    const title = this.getAttribute("title");
    const description = this.getAttribute("description");
    const link = this.getAttribute("link");
    const linkText = this.getAttribute("linkText");
    const img = this.getAttribute("img");
    // treat presence of the `reverse` attribute (any value) as a toggle
    const reverse = this.hasAttribute('reverse');

    this.innerHTML = `
        <section class="container-flex d-flex flex-column flex-md-row align-items-center justify-content-center g-4 m-5 ${reverse ? 'flex-md-row-reverse' : ''}">
            <div class="flex-grow-1">
                <h2>${title}</h2>
                <p>${description}</p>
                <a class="btn text-white my-2 py-2 px-3" style="background-color: #264b74ff" href="${link}">${linkText}</a>
            </div>
            <!-- give the image a responsive wrapper; spacing depends on reversed layout -->
            <div class="${reverse ? 'me-md-5 mt-3 mt-md-0' : 'ms-md-5 mt-3 mt-md-0'} flex-shrink-1 section-img">
                <img src="${img}" class="img-fluid d-block" style="width:100%; height:auto; object-fit:cover;"/>
            </div>
        </section>
    `;
  }
}
customElements.define("t-section", TSection);
// footer
class Tfooter extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
            <footer id="footer" class="text-white" style="background-color: #0D1B2A;">
                <div class="container py-4">
                    <div class="row">
                        <div class="col-md-4">
                            <h5><b>Nusaman Tech Solutions</b></h5>
                            <p>Menginovasi Masa Depan Digital Indonesia!</p>
                        </div>
                        <div class="col-md-4">
                            <h5><b>Kontak</b></h5>
                            <ul class="list-unstyled">
                                <li>Jl. Industri No. 123, Malang</li>
                                <li>Email: info@nusaman.com</li>
                                <li>Telp: (021) 111-2233</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h5><b>Tautan Cepat</b></h5>
                            <ul class="list-unstyled">
                                <li><a href="index.html" class="text-white text-decoration-none">Beranda</a></li>
                                <li><a href="about.html" class="text-white text-decoration-none">Tentang Kami</a></li>
                                <li><a href="contact.html" class="text-white text-decoration-none">Kontak</a></li>
                            </ul>
                        </div>
                    </div>
                    <hr class="border-white">
                    <p class="text-center mb-0">© 2025 Nusaman Tech Solutions. All rights reserved.</p>
                </div>
            </footer>
        `;
    }
}
customElements.define("t-footer", Tfooter);
