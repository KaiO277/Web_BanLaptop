const detailList = $('.dp-list');
const detailItem = $('.dp-item');
const viewWidth = detailList.offsetWidth;
const detailItemCount = detailList.childElementCount;
const leftCtl = $('.dp-left');
const rightCtl = $('.dp-right');

let currentIndexItem = 0;
console.log(parseFloat(getComputedStyle(detailList)['transitionDuration']));

leftCtl.onclick = function () {
    if (currentIndexItem > 0) {
        currentIndexItem--;
        console.log(currentIndexItem);
        detailList.style.transform = `translateX(-${currentIndexItem * 100}%)`;
    } 
    currentIndexItem === 0 &&  this.classList.add('disable');
    rightCtl.classList.contains('disable') && rightCtl.classList.remove('disable');
}
rightCtl.onclick = function () {
    if (currentIndexItem < detailItemCount-1) {
        currentIndexItem++;
        detailList.style.transform = `translateX(-${currentIndexItem * 100}%)`;
    }
    currentIndexItem === detailItemCount - 1 &&  this.classList.add('disable');
    leftCtl.classList.contains('disable') && leftCtl.classList.remove('disable');
}

