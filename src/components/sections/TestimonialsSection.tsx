import { Star, Quote } from "lucide-react";

const testimonials = [
  {
    name: "Sarah Mitchell",
    role: "Founder, BloomCraft",
    country: "🇺🇸 United States",
    rating: 5,
    text: "ZephyricsStudio transformed our outdated site into a modern, conversion-focused platform. Sales are up 60% in three months. Truly a growth partner.",
    initials: "SM",
  },
  {
    name: "Rajesh Kumar",
    role: "CEO, TechNova Solutions",
    country: "🇮🇳 India",
    rating: 5,
    text: "Their attention to detail and design sense is unmatched. The team delivered ahead of schedule and communication was crystal clear throughout.",
    initials: "RK",
  },
  {
    name: "Emma Thompson",
    role: "Marketing Head, Lumen Co.",
    country: "🇬🇧 United Kingdom",
    rating: 5,
    text: "Our new brand identity and website feel premium and authentic. ZephyricsStudio understood our vision better than we did ourselves.",
    initials: "ET",
  },
  {
    name: "David Chen",
    role: "Owner, Pacific Ventures",
    country: "🇦🇺 Australia",
    rating: 5,
    text: "SEO results have been phenomenal. We went from page 4 to top 3 on our main keywords in just months. Highly recommend their team.",
    initials: "DC",
  },
  {
    name: "Aisha Al-Farsi",
    role: "Creative Director, Noor Studio",
    country: "🇦🇪 UAE",
    rating: 5,
    text: "Beautiful UI/UX, flawless development, and honest pricing. They treat every project like it's their own — rare quality these days.",
    initials: "AA",
  },
  {
    name: "Lucas Silva",
    role: "Co-founder, Verde Digital",
    country: "🇧🇷 Brazil",
    rating: 5,
    text: "Professional, responsive, and creative. Our landing page conversions doubled after their redesign. Worth every penny.",
    initials: "LS",
  },
];

export function TestimonialsSection() {
  return (
    <section className="py-24 bg-background relative overflow-hidden">
      {/* Background Glow */}
      <div className="absolute top-1/4 right-0 w-[500px] h-[500px] bg-primary/5 rounded-full blur-[150px]" />
      <div className="absolute bottom-1/4 left-0 w-[500px] h-[500px] bg-primary/5 rounded-full blur-[150px]" />

      <div className="container relative z-10 px-4 sm:px-6 lg:px-8">
        {/* Header */}
        <div className="text-center max-w-3xl mx-auto mb-16">
          <span className="text-primary text-sm font-semibold uppercase tracking-wider">
            Client Testimonials
          </span>
          <h2 className="font-display text-3xl sm:text-4xl md:text-5xl font-bold text-foreground mt-3 mb-4">
            Trusted by Brands
            <span className="gradient-text"> Around the World</span>
          </h2>
          <p className="text-lg text-muted-foreground">
            Real words from real clients. Here's what they say about working with us.
          </p>

          {/* Rating Summary */}
          <div className="flex items-center justify-center gap-3 mt-8">
            <div className="flex items-center gap-1">
              {[...Array(5)].map((_, i) => (
                <Star key={i} className="w-5 h-5 fill-primary text-primary" />
              ))}
            </div>
            <span className="text-foreground font-semibold">4.9/5</span>
            <span className="text-muted-foreground text-sm">from 120+ reviews</span>
          </div>
        </div>

        {/* Testimonials Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {testimonials.map((t, index) => (
            <div
              key={t.name}
              className="relative p-8 rounded-2xl card-gradient border border-border hover:border-primary/30 transition-all duration-300 group animate-fade-up"
              style={{ animationDelay: `${index * 0.1}s` }}
            >
              {/* Quote Icon */}
              <Quote className="absolute top-6 right-6 w-8 h-8 text-primary/20 group-hover:text-primary/40 transition-colors" />

              {/* Stars */}
              <div className="flex items-center gap-1 mb-4">
                {[...Array(t.rating)].map((_, i) => (
                  <Star key={i} className="w-4 h-4 fill-primary text-primary" />
                ))}
              </div>

              {/* Text */}
              <p className="text-muted-foreground leading-relaxed mb-6">
                "{t.text}"
              </p>

              {/* Author */}
              <div className="flex items-center gap-4 pt-4 border-t border-border">
                <div className="w-12 h-12 rounded-full bg-primary/20 flex items-center justify-center flex-shrink-0">
                  <span className="font-display font-bold text-primary">{t.initials}</span>
                </div>
                <div>
                  <p className="font-semibold text-foreground">{t.name}</p>
                  <p className="text-xs text-muted-foreground">{t.role}</p>
                  <p className="text-xs text-muted-foreground mt-0.5">{t.country}</p>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}