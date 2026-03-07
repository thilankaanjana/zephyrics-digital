import { Shield, Zap, HeartHandshake, Target, Clock, Award } from "lucide-react";

const benefits = [
  {
    icon: Shield,
    title: "Quality First",
    description: "We don't cut corners. Every project gets our full attention and expertise.",
  },
  {
    icon: Zap,
    title: "Fast Delivery",
    description: "Time matters. We work efficiently to launch your project on schedule.",
  },
  {
    icon: HeartHandshake,
    title: "Long-term Partner",
    description: "We're not just vendors. We grow with you and support your ongoing success.",
  },
  {
    icon: Target,
    title: "Results-Driven",
    description: "Every design decision is backed by data and focused on your goals.",
  },
  {
    icon: Clock,
    title: "Always Available",
    description: "Questions? Changes? We're here when you need us, across time zones.",
  },
  {
    icon: Award,
    title: "Modern Standards",
    description: "Using the latest tools and best practices for optimal performance.",
  },
];

export function WhyUsSection() {
  return (
    <section className="py-24 bg-card relative overflow-hidden">
      {/* Background Glow */}
      <div className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-primary/5 rounded-full blur-[150px]" />
      
      <div className="container relative z-10 px-4 sm:px-6 lg:px-8">
        <div className="grid lg:grid-cols-2 gap-16 items-center">
          {/* Left Content */}
          <div>
            <span className="text-primary text-sm font-semibold uppercase tracking-wider">Why Choose Us</span>
            <h2 className="font-display text-3xl sm:text-4xl md:text-5xl font-bold text-foreground mt-3 mb-6">
              Your Success Is
              <span className="gradient-text"> Our Priority</span>
            </h2>
            <p className="text-lg text-muted-foreground mb-8 leading-relaxed">
              We're not just another agency. We're a team of passionate creators who genuinely 
              care about helping your business thrive in the digital world. No fluff, no overpromises 
              — just honest work that delivers real value.
            </p>
            <div className="flex items-center gap-4 p-4 rounded-xl bg-muted/50 border border-border">
              <div className="w-12 h-12 rounded-full bg-primary/20 flex items-center justify-center flex-shrink-0">
                <span className="text-2xl">🤝</span>
              </div>
              <div>
                <p className="font-semibold text-foreground">Transparent Partnership</p>
                <p className="text-sm text-muted-foreground">Clear communication, fair pricing, no hidden surprises.</p>
              </div>
            </div>
          </div>

          {/* Right Grid */}
          <div className="grid sm:grid-cols-2 gap-4">
            {benefits.map((benefit, index) => (
              <div
                key={benefit.title}
                className={`p-6 rounded-xl bg-background border border-border hover:border-primary/30 transition-all duration-300 ${
                  index % 2 === 1 ? "sm:translate-y-6" : ""
                }`}
              >
                <benefit.icon className="w-8 h-8 text-primary mb-4" />
                <h3 className="font-display font-semibold text-foreground mb-2">
                  {benefit.title}
                </h3>
                <p className="text-sm text-muted-foreground">
                  {benefit.description}
                </p>
              </div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}
