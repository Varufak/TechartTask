document.addEventListener('DOMContentLoaded', function(){

	let newsFetch = fetch('/api/news.php?page=' + currentPage);
	newsFetch.then(response => response.json()).then(news => responseHandler(news));
});

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const currentPage = Number(urlParams.get('page') ?? 1);

function responseHandler(news){
	last = news['last'];
	count = news['count'];
	data = news['data'];
	bannerCreate(last);
	for(row of data){
		newsCreate(row);
	}
	paginationCreate(count);
}

function bannerCreate(lastNews){
	const banner = document.querySelector('.banner');

	let bannerImg = document.createElement('img');
	bannerImg.src = '/media/' + lastNews['image'];
	bannerImg.className = 'banner__img';
	banner.append(bannerImg);

	let bannerGradient = document.createElement('div');
	bannerGradient.className = 'banner__img gradient';
	banner.append(bannerGradient);

	let bannerContent = document.createElement('div');
	bannerContent.className = 'banner__content container';

	let bannerTitle = document.createElement('h2');
	bannerTitle.className = 'banner__title h1';
	bannerTitle.innerHTML = lastNews['title'];
	bannerContent.appendChild(bannerTitle);

	let bannerAnnounce = document.createElement('p');
	bannerAnnounce.className = 'banner__text';
	bannerAnnounce.innerHTML = lastNews['announce'];
	bannerContent.appendChild(bannerAnnounce);

	banner.append(bannerContent);
}

function paginationCreate(newsCount){
	let pagesCount = newsCount / 4;
	pagesCount = Math.ceil(pagesCount);

	const pagination = document.querySelector('.pagination');

	let pageNumber;

	if (currentPage > 1){
		const pagination = document.querySelector('.pagination');

		let paginationBack = document.createElement('a');
		paginationBack.innerHTML = arrowNext;
		paginationBack.className = 'pagination__button pagination__next-button rotate-button';
		paginationBack.href = '?page=' + (currentPage - 1);
		pagination.appendChild(paginationBack);
	}

	switch(true){
	case currentPage === 1:
		pageNumber = 1
		break;
	case currentPage === pagesCount:
		pageNumber = currentPage - 2;
		break;
	case currentPage > 1:
		pageNumber = currentPage - 1;
		break;
	}

	for(let i = 1; i <= 3 && pageNumber <= pagesCount; i++ && pageNumber++){
		let page = document.createElement('a');
		page.innerText = pageNumber;
		page.className ='pagination__button';
		if(pageNumber === currentPage){
			page.className += ' fill-color';
		}
		page.href = '?page=' + pageNumber;
		
		pagination.append(page);
	}

	if (currentPage < pagesCount){
		const pagination = document.querySelector('.pagination');

		let paginationNext = document.createElement('a');
		paginationNext.innerHTML = arrowNext;
		paginationNext.className = 'pagination__button pagination__next-button';
		paginationNext.href = '?page=' + (currentPage + 1);
		pagination.appendChild(paginationNext);
	}
}

function newsCreate(newsData){
	let date = new Date(newsData['date']);

	let news = document.createElement('a');
	news.className ='news';
	news.href ='/news_detail?id=' + newsData['id'];

	let newsDate = document.createElement('div');
	newsDate.innerText = formatDate(date);
	newsDate.className ='news__date';
	news.appendChild(newsDate);

	let newsTitle = document.createElement('h3');
	newsTitle.innerText = newsData['title'];
	newsTitle.className ='news__title h2';
	news.appendChild(newsTitle);

	let newsAnnounce = document.createElement('p');
	newsAnnounce.innerHTML = newsData['announce'];
	newsAnnounce.className ='news__announce';
	news.appendChild(newsAnnounce);

	let newsButton = document.createElement('button');
	newsButton.innerHTML = 'ПОДРОБНЕЕ' + arrow;
	newsButton.className ='news__button';
	news.appendChild(newsButton);

	const currentDiv = document.querySelector('.content');
	currentDiv.append(news);
}

function formatDate(date) {
    const day = String(date.getDate()).padStart(2, '0');
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const year = date.getFullYear();

    return `${day}.${month}.${year}`;
}

const arrow = '<svg class="arrow" width="27" height="16" viewBox="0 0 27 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 7C0.447715 7 4.82823e-08 7.44772 0 8C-4.82823e-08 8.55228 0.447715 9 1 9L1 7ZM26.707 8.70711C27.0975 8.31658 27.0975 7.68342 26.707 7.2929L20.343 0.928934C19.9525 0.538409 19.3193 0.538409 18.9288 0.928934C18.5383 1.31946 18.5383 1.95262 18.9288 2.34315L24.5857 8L18.9288 13.6569C18.5383 14.0474 18.5383 14.6805 18.9288 15.0711C19.3193 15.4616 19.9525 15.4616 20.343 15.0711L26.707 8.70711ZM1 9L25.9999 9L25.9999 7L1 7L1 9Z" fill="currentColor"/></svg>';
const arrowNext = '<svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 10C2.44772 10 2 10.4477 2 11C2 11.5523 2.44772 12 3 12L3 10ZM18.466 11.7071C18.8565 11.3166 18.8565 10.6834 18.466 10.2929L12.102 3.92893C11.7115 3.53841 11.0783 3.53841 10.6878 3.92893C10.2973 4.31946 10.2973 4.95262 10.6878 5.34315L16.3447 11L10.6878 16.6569C10.2973 17.0474 10.2973 17.6805 10.6878 18.0711C11.0783 18.4616 11.7115 18.4616 12.102 18.0711L18.466 11.7071ZM3 12L17.7589 12L17.7589 10L3 10L3 12Z" fill="#841844"/></svg>'
