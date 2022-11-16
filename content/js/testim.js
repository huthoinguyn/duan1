const timeSlide = 6000;

let slideIndex = 0;
const listTestim = [
  {
    avatar:
      "https://images.unsplash.com/photo-1493863641943-9b68992a8d07?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1158&q=80",
    name: "Kys nè",
    comment:
      "Cho em 1 đen đá không đường, để em biết được đường vào tim anh.",
  },
  {
    avatar:
      "https://images.unsplash.com/photo-1661347333292-b783583d4210?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80",
    name: "Phan Thanh Qui",
    comment: "Cà phê ngon lắm ạ, giá cả phải chăng nữa.",
  },
  {
    avatar:
      "https://images.unsplash.com/photo-1516357231954-91487b459602?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1172&q=80",
    name: "Le Tan Tai",
    comment: "Phục vụ nhiệt tình, chủ shop dễ thương cho shop mườiiii điểm.",
  },
  {
    avatar:
      "https://images.unsplash.com/photo-1516357231954-91487b459602?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1172&q=80",
    name: "Quí kd",
    comment: "Mười điểm mười điểm.",
  },
];
const testim = {
  handleEvents: function () {
    const _this = this;
    $(".testim-left").onclick = () => {
      slideIndex--;
      if (slideIndex < 0) {
        slideIndex = listTestim.length - 1;
      }
      this.render(slideIndex);
    };
    $(".testim-right").onclick = () => {
      slideIndex++;
      if (slideIndex > listTestim.length - 1) {
        slideIndex = 0;
      }
      this.render(slideIndex);
    };
    $$(".testim-dots .dot").forEach((dot, i) => {
      dot.onclick = () => {
        slideIndex = i;
        _this.render(slideIndex);
      };
    });
    setInterval(() => {
      slideIndex++;
      if (slideIndex > listTestim.length - 1) {
        slideIndex = 0;
      }
      this.render(slideIndex);
    }, timeSlide);
  },
  render: function (slideNum) {
    const testimTemplate = `
    <div class="testim-avatar testim-slide">
                    <img src="${listTestim[slideNum].avatar}"
                        alt="avatar">
                </div>
                <div class="testim-info testim-slide">
                    <div class="name">${listTestim[slideNum].name}</div>
                    <div class="comment">${listTestim[slideNum].comment}</div>
                </div>
    `;
    $(".testim-content").innerHTML = testimTemplate;
    [...$$(".testim-slide")].map(
      (i) => (i.style.animationDuration = timeSlide + "ms")
    );
    [...$$(".testim-dots .dot")].map((i) => i.classList.remove("active"));
    [...$$(".testim-dots .dot")][slideNum].classList.add("active");
  },
  start: function () {
    this.render(slideIndex);
    this.handleEvents();
  },
};

testim.start();
