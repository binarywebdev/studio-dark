/* ═══════════════════════════════════════════
   Motion layer — cursor · magnetic · parallax · reveal
═══════════════════════════════════════════ */

// ── Custom cursor ──────────────────────────
// Guarded: the cursor markup only exists on the landing (front-page),
// so on blog/page templates this block is skipped instead of throwing.
const cur = document.getElementById('cur');
const ring = document.getElementById('curRing');
if (cur && ring) {
  let mx = innerWidth / 2, my = innerHeight / 2, rx = mx, ry = my;

  addEventListener('mousemove', e => {
    mx = e.clientX; my = e.clientY;
    cur.style.transform = `translate(${mx}px, ${my}px) translate(-50%,-50%)`;
  });
  (function ringLoop() {
    rx += (mx - rx) * 0.18;
    ry += (my - ry) * 0.18;
    ring.style.transform = `translate(${rx}px, ${ry}px) translate(-50%,-50%)`;
    requestAnimationFrame(ringLoop);
  })();
  document.querySelectorAll('a, button, .card, [data-magnet]').forEach(el => {
    el.addEventListener('mouseenter', () => { ring.style.width = '60px'; ring.style.height = '60px'; });
    el.addEventListener('mouseleave', () => { ring.style.width = '38px'; ring.style.height = '38px'; });
  });
}

// ── Magnetic buttons ───────────────────────
document.querySelectorAll('[data-magnet]').forEach(el => {
  const strength = 0.35;
  el.addEventListener('mousemove', e => {
    const r = el.getBoundingClientRect();
    const x = e.clientX - (r.left + r.width / 2);
    const y = e.clientY - (r.top + r.height / 2);
    el.style.transform = `translate(${x * strength}px, ${y * strength}px)`;
  });
  el.addEventListener('mouseleave', () => { el.style.transform = 'translate(0,0)'; });
});

// ── Mouse + scroll parallax ────────────────
const parEls = document.querySelectorAll('[data-par]');
function applyParallax(px, py) {
  parEls.forEach(el => {
    const k = parseFloat(el.dataset.par);
    el.style.transform = `translate(${px * k * 40}px, ${py * k * 40}px)`;
  });
}
addEventListener('mousemove', e => {
  applyParallax((e.clientX / innerWidth - 0.5) * 2, (e.clientY / innerHeight - 0.5) * 2);
});

// ── Scroll reveal ──────────────────────────
const io = new IntersectionObserver((entries) => {
  entries.forEach((e, i) => {
    if (e.isIntersecting) {
      setTimeout(() => e.target.classList.add('in'), i * 90);
      io.unobserve(e.target);
    }
  });
}, { threshold: 0.18 });
document.querySelectorAll('.reveal').forEach(el => io.observe(el));

// ── Hero entrance stagger ──────────────────
addEventListener('load', () => {
  document.querySelectorAll('.hi').forEach((el, i) => {
    el.style.transition = 'opacity .9s ease, transform .9s cubic-bezier(.2,.8,.2,1)';
    el.style.transitionDelay = (0.1 + i * 0.09) + 's';
    requestAnimationFrame(() => { el.style.opacity = '1'; el.style.transform = 'none'; });
  });
});

// ── Work — scroll-driven horizontal slider ──
(function () {
  const wrap  = document.getElementById('workWrap');
  const track = document.getElementById('workTrack');
  if (!wrap || !track) return;

  let target = 0, current = 0;
  const ease = 0.08;
  let enabled = false;

  function maxTranslate() {
    return Math.max(0, track.scrollWidth - track.parentElement.offsetWidth + 24);
  }

  function setHeight() {
    // Below 920px we hand off to a native swipeable row (see CSS).
    if (window.innerWidth < 920) {
      enabled = false;
      wrap.style.height = '';
      track.style.transform = '';
      return;
    }
    enabled = true;
    wrap.style.height = 'calc(100vh + ' + (maxTranslate() + 120) + 'px)';
  }

  function onScroll() {
    if (!enabled) return;
    const rect  = wrap.getBoundingClientRect();
    const range = wrap.offsetHeight - window.innerHeight;
    const progress = Math.max(0, Math.min(1, -rect.top / range));
    target = progress * maxTranslate();
  }

  function raf() {
    if (enabled) {
      current += (target - current) * ease;
      track.style.transform = 'translateX(' + (-current).toFixed(2) + 'px)';
    }
    requestAnimationFrame(raf);
  }

  addEventListener('scroll', onScroll, { passive: true });
  addEventListener('resize', () => { setHeight(); onScroll(); });
  addEventListener('load', () => { setHeight(); onScroll(); });

  setHeight();
  onScroll();
  raf();
})();

// ── Footer feature bubbles: drop in on scroll ──
(function () {
  const circles = document.getElementById('cfootCircles');
  if (!circles) return;
  const obs = new IntersectionObserver((entries) => {
    entries.forEach((e) => {
      if (e.isIntersecting) { circles.classList.add('in'); obs.disconnect(); }
    });
  }, { threshold: 0.2 });
  obs.observe(circles);

  // Magnetic hover on each bubble (own layer, separate from the drop wrapper)
  const strength = 0.28;
  circles.querySelectorAll('.cf-bubble').forEach((el) => {
    el.addEventListener('mousemove', (e) => {
      const r = el.getBoundingClientRect();
      const x = e.clientX - (r.left + r.width / 2);
      const y = e.clientY - (r.top + r.height / 2);
      el.style.transform = `translate(${(x * strength).toFixed(1)}px, ${(y * strength).toFixed(1)}px)`;
    });
    el.addEventListener('mouseleave', () => { el.style.transform = 'translate(0, 0)'; });
  });
})();

// ── Hero blob: liquid drop that chases the cursor with inertia ──
// Morphing (border-radius) is CSS; this only drives transform, so they compose.
(function () {
  const shape = document.querySelector('.visual .shape');
  if (!shape) return;
  const anchor = shape.parentElement; // .visual — stable, never transformed

  let mx = innerWidth * 0.72, my = innerHeight * 0.5;       // cursor
  let cx = 0, cy = 0;                                       // eased offset
  let ar = anchor.getBoundingClientRect();                  // cached anchor rect

  const FOLLOW = 0.16;   // how strongly it leans toward the cursor
  const MAX    = 56;     // px — clamp so a far cursor only tugs it a little
  const EASE   = 0.085;  // lower = more lag / more "liquid" trailing

  addEventListener('mousemove', (e) => { mx = e.clientX; my = e.clientY; });
  const recache = () => { ar = anchor.getBoundingClientRect(); };
  addEventListener('scroll', recache, { passive: true });
  addEventListener('resize', recache);

  (function loop() {
    const acx = ar.left + ar.width / 2;
    const acy = ar.top + ar.height / 2;
    let tx = (mx - acx) * FOLLOW;
    let ty = (my - acy) * FOLLOW;
    const d = Math.hypot(tx, ty);
    if (d > MAX) { tx = tx / d * MAX; ty = ty / d * MAX; }

    const pvx = cx, pvy = cy;
    cx += (tx - cx) * EASE;
    cy += (ty - cy) * EASE;

    // droplet stretch along the direction of motion
    const vx = cx - pvx, vy = cy - pvy;
    const speed = Math.hypot(vx, vy);
    const e = Math.min(speed * 0.05, 0.16);
    const a = Math.atan2(vy, vx) * 180 / Math.PI;
    shape.style.transform =
      `translate(${cx.toFixed(2)}px, ${cy.toFixed(2)}px) rotate(${a.toFixed(2)}deg) scale(${(1 + e).toFixed(3)}, ${(1 - e).toFixed(3)}) rotate(${(-a).toFixed(2)}deg)`;

    requestAnimationFrame(loop);
  })();
})();
