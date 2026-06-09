/* ═══════════════════════════════════════════
   Animated chart backdrop — scrolling price
   lines drawn on a fixed full-screen canvas.
   Cool palette: emerald + cyan, low opacity so
   foreground content stays readable.
═══════════════════════════════════════════ */
(function () {
  var canvas = document.getElementById('chartBg');
  if (!canvas) return;
  var ctx = canvas.getContext('2d');
  if (!ctx) return;

  var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  var W = 0, H = 0, dpr = Math.min(window.devicePixelRatio || 1, 2);

  function resize() {
    W = window.innerWidth;
    H = window.innerHeight;
    canvas.width = Math.floor(W * dpr);
    canvas.height = Math.floor(H * dpr);
    canvas.style.width = W + 'px';
    canvas.style.height = H + 'px';
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
  }
  window.addEventListener('resize', resize);
  resize();

  // ── two random-walk series, regenerated as they scroll off ──
  var STEP = 26;                 // px between points
  var series = [
    { color: '47,230,160', amp: 0.16, base: 0.42, pts: [], v: 0 },   // emerald
    { color: '34,211,238', amp: 0.11, base: 0.62, pts: [], v: 0 }    // cyan
  ];
  var seedR = 0.5;
  function rnd() { seedR = (seedR * 9301 + 49297) % 233280; return seedR / 233280; }

  function need() { return Math.ceil(W / STEP) + 4; }
  function fill(s) {
    while (s.pts.length < need()) {
      s.v += (rnd() - 0.5) * s.amp;
      if (s.v > 1) s.v = 1; if (s.v < -1) s.v = -1;
      s.pts.push(s.v);
    }
  }
  series.forEach(fill);

  var offset = 0;
  var SPEED = reduce ? 0 : 0.35;   // px/frame

  function draw() {
    ctx.clearRect(0, 0, W, H);

    // faint vertical grid that drifts with the chart
    ctx.strokeStyle = 'rgba(238,241,244,0.035)';
    ctx.lineWidth = 1;
    var gx = -((offset) % 96);
    for (var x = gx; x < W; x += 96) {
      ctx.beginPath(); ctx.moveTo(x, 0); ctx.lineTo(x, H); ctx.stroke();
    }

    series.forEach(function (s) {
      var n = s.pts.length;
      function px(i) { return i * STEP - (offset % STEP); }
      function py(i) { return H * (s.base) - s.pts[i] * H * s.amp * 2.4; }

      // area fill
      var grad = ctx.createLinearGradient(0, 0, 0, H);
      grad.addColorStop(0, 'rgba(' + s.color + ',0.16)');
      grad.addColorStop(1, 'rgba(' + s.color + ',0)');
      ctx.beginPath();
      ctx.moveTo(px(0), py(0));
      for (var i = 1; i < n; i++) ctx.lineTo(px(i), py(i));
      ctx.lineTo(px(n - 1), H); ctx.lineTo(px(0), H); ctx.closePath();
      ctx.fillStyle = grad; ctx.fill();

      // stroke
      ctx.beginPath();
      ctx.moveTo(px(0), py(0));
      for (var j = 1; j < n; j++) ctx.lineTo(px(j), py(j));
      ctx.strokeStyle = 'rgba(' + s.color + ',0.55)';
      ctx.lineWidth = 1.6;
      ctx.shadowColor = 'rgba(' + s.color + ',0.5)';
      ctx.shadowBlur = 12;
      ctx.stroke();
      ctx.shadowBlur = 0;
    });
  }

  function tick() {
    offset += SPEED;
    if (offset >= STEP) {
      offset -= STEP;
      series.forEach(function (s) {
        s.pts.shift();
        s.v += (rnd() - 0.5) * s.amp;
        if (s.v > 1) s.v = 1; if (s.v < -1) s.v = -1;
        s.pts.push(s.v);
      });
    }
    draw();
    if (!reduce) requestAnimationFrame(tick);
  }

  window.addEventListener('resize', function () { series.forEach(fill); });
  if (reduce) { draw(); } else { requestAnimationFrame(tick); }
})();
