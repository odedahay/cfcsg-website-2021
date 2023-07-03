class Search {

    // 1. initiate our object
    constructor(){
        this.addSearchHTML();
        this.resultsDiv = document.querySelector("#search-overlay__results");
        this.openButton = document.querySelectorAll(".js-search-trigger");
        this.closeButton = document.querySelector(".search-overlay__close");
        this.searchOverlay = document.querySelector(".search-overlay");
        this.searchField = document.querySelector("#search-term");
        this.isOverlayOpen = false
        this.isSpinnerVisible = false
        this.previousValue
        this.typingTimer
        this.event();
       
    }

    // 2. events
    event(){
        this.openButton.forEach(el => {
            el.addEventListener("click", e => {
              e.preventDefault()
              this.openOverlay()
            })
        })
        
        this.closeButton.addEventListener("click", () => this.closeOverlay())
        document.addEventListener("keydown", e => this.keyPressDispatcher(e))
        document.addEventListener("keyup", ()=> this.typingLogic())
    }


    // 3. methods 
    typingLogic(){

        if(this.searchField.value != this.previousValue){
            clearTimeout(this.typingTimer);
            if (this.searchField.value) {
                if(!this.isSpinnerVisible){
                    this.resultsDiv.innerHTML = '<div class="spinner-loader"></div>'
                    this.isSpinnerVisible = true   
                }
                this.typingTimer = setTimeout(this.getResults.bind(this), 750)
            }else{
                this.resultsDiv.innerHTML = ""
                this.isSpinnerVisible = false
            }
        }

        this.previousValue = this.searchField.value
    }

    async getResults(){
    
        try{
            const response = await axios.get( cfcdata.root_url + '/wp-json/couplesforchrist/v1/search?keyword=' + this.searchField.value);
            const results = response.data
            
            // display the results
            this.resultsDiv.innerHTML = `
                <section class="section">
                    <div class="container">
                        <div class="row row-50 justify-content-center">
                            <div class="col-lg-4">
                                <h2 class="search-overlay__section-title">General Information</h2>
                                ${results.generalInfo.length ? '<ul class="link-list min-list">' : "<p>No general information matches that search.</p>"}

                                ${results.generalInfo.map(item => `<li><a href="${item.permalink}">${item.title}</a></li>`).join("")}

                                ${results.generalInfo.length ? "</ul>" : ""}
                                
                            </div>
                            <div class="col-lg-4">
                                <h2 class="search-overlay__section-title">Upcoming Events</h2>
                                ${results.events.length ? '<div class="pt-2">' : `<p>No event information. <a href="${cfcdata.root_url}/events" style="text-decoration: underline;">View all events</a></p>`}

                                ${results.events.map(item => `
                                    <article class="profile-creative">
                                        <a href="${item.permalink}">
                                            <time class="post-light-time" datetime="${item.year}">
                                                <span class="post-light-time-big">${item.day}</span>
                                                <span class="post-light-time-small">${item.month} ${' '} ${item.year}</span>
                                            </time>
                                        </a>
                                        <div class="profile-creative-main">
                                            <h5 class="profile-creative-title">
                                                <a href="${item.permalink}">${item.title}</a>
                                            </h5>
                                            <div class="profile-creative-contacts margin-top-10">
                                                <p>${item.description} </p>
                                            </div>
                                        </div>
                                    </article>
                                `).join("")}

                                ${results.events.length ? "</div>" : ""}
                            </div>
                            <div class="col-lg-4">
                                <h2 class="search-overlay__section-title">Latest News</h2>
                                ${results.latestNews.length ? '<ul class="link-list min-list">' : `<p>No news information. <a href="${cfcdata.root_url}/latest-news" style="text-decoration: underline;">View all latest news</a></p>`}

                                ${results.latestNews.map(item => `<li><a href="${item.permalink}">${item.title}</a> ${item.postType == "post" ? `by ${item.authorName}` : ""}</li>`).join("")}

                                ${results.latestNews.length ? "</ul>" : ""}
                            </div>
                        </div>
                    </div>
                </section>
                `
            this.isSpinnerVisible = false;       
        }catch(e){
            console.log(e)
        }
       
    }

    keyPressDispatcher(e){
        if(e.keyCode == 83 && !this.isOverlayOpen && document.activeElement.tagName != "INPUT" && document.activeElement.tagName != "TEXTAREA"){
            this.openOverlay();
        }

        if(e.keyCode == 27 && this.isOverlayOpen){
            this.closeOverlay();
        }
    }

    openOverlay() {
        this.searchOverlay.classList.add("search-overlay--active")
        document.body.classList.add("body-no-scroll")
        this.searchField.value = ""
        setTimeout(() => this.searchField.focus(), 301)
        this.isOverlayOpen = true
        return false
    }
    closeOverlay(){
        this.searchOverlay.classList.remove("search-overlay--active")
        document.body.classList.remove("body-no-scroll")
        this.isOverlayOpen = false
    }

    addSearchHTML() {
        document.body.insertAdjacentHTML(
            "beforeend",
            `<div class="search-overlay">
                <div class="search-overlay__top">
                <div class="container">
                    <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
                    <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term">
                    <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
                </div>
                </div>
                <div class="container">
                <div id="search-overlay__results"></div>
                </div>
            </div>
            `
        );
    }

}

// initiate the class function
new Search();