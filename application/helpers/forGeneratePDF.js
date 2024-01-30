function downloadDeposit() {
	let doc = new jspdf.jsPDF({
		orientation: "p",
		unit: "px",
	});

	const length = 10;

	let toPrint = "";

	for (let i = 0; i < length; i++) {
		if (i % 2 == 0) {
			toPrint += `<div class="mx-auto d-flex flex-column border-dark" style="/*margin-top:3rem*/;width:80rem;height:112.75rem;border:1px black solid;${
				i == length - 1
					? `padding-top:5rem;">${content()}</div>`
					: `justify-content:space-evenly;">${content()}`
			}`;
			// toPrint += `${content()} ${i == 38 ? "</div>" : ""}`;
		} else
			toPrint += `<div style="display:block;width:100%;border-bottom:1px #666 dashed;"></div>${content()}</div>`;
	}
	doc.html(toPrint, {
		html2canvas: {
			scale: 0.35,
		},
		async callback(pdf) {
			// document.querySelector(".card").innerHTML = toPrint
			const date = new Date();
			await pdf.save(`receipt-${date.toISOString()}.pdf`);
		},
	});
}

for (let i = 0; i < length; i++){
		const array = data.splice(0, 10)
		toPrint += `<div class="mx-auto d-flex flex-column border-dark" style="/*margin-top:3rem*/;width:80rem;height:112.75rem;border:1px #FFF solid;${
			i == length - 1
				? `padding-top:5rem;">${content(array)}</div>`}
			