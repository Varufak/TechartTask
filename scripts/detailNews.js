document.addEventListener('DOMContentLoaded', function(){

	let detailNewsFetch = fetch('/api/detailNews.php?id=' + currentId);
	detailNewsFetch.then(response => response.json()).then(data => fillData(data));

	const button = document.querySelector('.news-detail-content__button');
	button.addEventListener('click', returnBack);
});

function returnBack(e){
	e.preventDefault();
	history.go(-1);
}

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const currentId = Number(urlParams.get('id'));

function fillData(data){
	let date = new Date(data['date']);

	const breadcrumbs = document.querySelector('.breadcrumbs__this');
	breadcrumbs.innerHTML = '/ ' + data['title'];

	const newsTitle = document.querySelector('.news-detail-title');
	newsTitle.innerHTML = data['title'];

	const newsDate = document.querySelector('.news-detail-content__date');
	newsDate.innerText = formatDate(date);

	const newsAnnounce = document.querySelector('.news-detail-content__announce');
	newsAnnounce.innerHTML = data['announce'];

	const newsContent = document.querySelector('.news-detail-content__content');
	newsContent.innerHTML = data['content'];

	const newsImg = document.querySelector('.news-detail-img');
	newsImg.src = '/media/' + data['image'];
}

function formatDate(date) {
    const day = String(date.getDate()).padStart(2, '0');
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const year = date.getFullYear();

    return `${day}.${month}.${year}`;
}