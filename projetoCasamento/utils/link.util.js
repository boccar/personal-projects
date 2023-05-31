const as = document.querySelectorAll('a');

for (const a of as) {
  const href = a.getAttribute('href');
  const classes = a.getAttribute('class');

  if (!classes?.includes('navbar-item')) {
    if (!href.includes('https://')) {
      a.href = `https://${href}`;
    }

    if (!href.includes('#')) {
      a.setAttribute('target', '_blank');
    }
  }
}
