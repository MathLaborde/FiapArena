const toolbarOptions = [
  [{ size: ["small", false, "large", "huge"] }],
  [{ header: [1, 2, 3, 4, 5, 6, false] }],
  ["bold", "italic", "underline", "strike"],
  [{ color: [] }, { background: [] }],
  ["link", "blockquote"],
  [{ list: "ordered" }, { list: "bullet" }, { list: "check" }],
  [{ align: [] }, { indent: "-1" }, { indent: "+1" }],
  [{ font: [] }],
];

const rulesQuill = new Quill("#tournament-rules", {
  modules: {
    toolbar: toolbarOptions,
  },
  theme: "snow",
  placeholder: "As regras são...",
});

const awardQuill = new Quill("#tournament-award", {
  modules: {
    toolbar: toolbarOptions,
  },
  theme: "snow",
  placeholder: "A premiação é...",
});
