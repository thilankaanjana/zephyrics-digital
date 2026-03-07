import { MessageSquare, Lightbulb, Code, Rocket } from "lucide-react";

const steps = [
  {
    icon: MessageSquare,
    step: "01",
    title: "Discovery",
    description: "We start by understanding your business, goals, and vision. No project begins without clarity.",
  },
  {
    icon: Lightbulb,
    step: "02",
    title: "Strategy & Design",
    description: "We create a tailored plan and design concepts that align perfectly with your brand.",
  },
  {
    icon: Code,
    step: "03",
    title: "Development",
    description: "Our team builds your solution with clean code, modern tech, and attention to every detail.",
  },
  {
    icon: Rocket,
    step: "04",
    title: "Launch & Support",
    description: "We launch, optimize, and provide ongoing support to ensure your continued success.",
  },
];

export function ProcessSection() {
  return (
    <section className="py-24 bg-background relative">
      <div className="container px-4 sm:px-6 lg:px-8">
        {/* Header */}
        <div className="text-center max-w-3xl mx-auto mb-16">
          <span className="text-primary text-sm font-semibold uppercase tracking-wider">Our Process</span>
          <h2 className="font-display text-3xl sm:text-4xl md:text-5xl font-bold text-foreground mt-3 mb-4">
            How We Bring Your
            <span className="gradient-text"> Vision to Life</span>
          </h2>
          <p className="text-lg text-muted-foreground">
            A clear, collaborative process that keeps you informed every step of the way.
          </p>
        </div>

        {/* Process Steps */}
        <div className="relative">
          {/* Connection Line */}
          <div className="hidden lg:block absolute top-1/2 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary/30 to-transparent" />
          
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            {steps.map((item, index) => (
              <div key={item.step} className="relative group">
                {/* Step Card */}
                <div className="p-8 rounded-2xl card-gradient border border-border hover:border-primary/30 transition-all duration-300 text-center">
                  {/* Step Number */}
                  <div className="absolute -top-4 left-1/2 -translate-x-1/2 w-8 h-8 rounded-full bg-primary flex items-center justify-center">
                    <span className="text-xs font-bold text-primary-foreground">{item.step}</span>
                  </div>
                  
                  <div className="w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center mx-auto mb-6 group-hover:bg-primary/20 transition-colors">
                    <item.icon className="w-7 h-7 text-primary" />
                  </div>
                  
                  <h3 className="font-display text-xl font-semibold text-foreground mb-3">
                    {item.title}
                  </h3>
                  <p className="text-muted-foreground text-sm leading-relaxed">
                    {item.description}
                  </p>
                </div>
                
                {/* Arrow (except last) */}
                {index < steps.length - 1 && (
                  <div className="hidden lg:block absolute top-1/2 -right-4 w-8 h-8 text-primary/30">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                      <path d="M9 18l6-6-6-6" />
                    </svg>
                  </div>
                )}
              </div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}
