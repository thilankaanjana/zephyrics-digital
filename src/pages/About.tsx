import { Layout } from "@/components/layout/Layout";
import { Target, Eye, Heart, Sparkles } from "lucide-react";

const values = [
  {
    icon: Target,
    title: "Quality Over Quantity",
    description: "We focus on delivering exceptional work, not just more work. Every project gets our full dedication.",
  },
  {
    icon: Eye,
    title: "Transparency",
    description: "Open communication, clear pricing, and honest timelines. No surprises, no hidden costs.",
  },
  {
    icon: Heart,
    title: "Client Success",
    description: "Your success is our success. We're invested in helping your business grow long-term.",
  },
  {
    icon: Sparkles,
    title: "Innovation",
    description: "We stay ahead of trends and technologies to bring you modern, future-proof solutions.",
  },
];

const About = () => {
  return (
    <Layout>
      {/* Hero Section */}
      <section className="pt-32 pb-16 bg-background relative overflow-hidden">
        <div className="absolute inset-0 hero-glow" />
        <div className="absolute inset-0 bg-grid-pattern bg-grid opacity-5" />
        
        <div className="container relative z-10 px-4 sm:px-6 lg:px-8">
          <div className="max-w-4xl mx-auto text-center">
            <span className="text-primary text-sm font-semibold uppercase tracking-wider">About Us</span>
            <h1 className="font-display text-4xl sm:text-5xl md:text-6xl font-bold text-foreground mt-4 mb-6">
              We're ZephyricsStudio
            </h1>
            <p className="text-xl text-muted-foreground leading-relaxed">
              A digital agency passionate about helping businesses thrive online. 
              We combine design, technology, and strategy to create digital experiences that matter.
            </p>
          </div>
        </div>
      </section>

      {/* Story Section */}
      <section className="py-20 bg-card">
        <div className="container px-4 sm:px-6 lg:px-8">
          <div className="grid lg:grid-cols-2 gap-16 items-center">
            <div>
              <h2 className="font-display text-3xl sm:text-4xl font-bold text-foreground mb-6">
                Our Story
              </h2>
              <div className="space-y-4 text-muted-foreground leading-relaxed">
                <p>
                  ZephyricsStudio was born from a simple belief: every business deserves 
                  access to world-class digital solutions, regardless of size or budget.
                </p>
                <p>
                  We started as a small team of designers and developers who were tired of 
                  seeing businesses struggle with outdated websites and missed opportunities. 
                  We knew we could do better.
                </p>
                <p>
                  Today, we work with startups, entrepreneurs, and growing businesses worldwide, 
                  helping them build powerful digital presences that drive real results. Our 
                  approach is simple: understand your goals, create beautiful solutions, and 
                  support your growth every step of the way.
                </p>
              </div>
            </div>
            <div className="relative">
              <div className="aspect-square rounded-2xl bg-gradient-to-br from-primary/20 via-primary/10 to-transparent border border-primary/20 flex items-center justify-center">
                <div className="text-center p-8">
                  <div className="w-24 h-24 rounded-2xl bg-primary/20 flex items-center justify-center mx-auto mb-6">
                    <span className="text-primary font-display font-bold text-5xl">Z</span>
                  </div>
                  <p className="font-display text-2xl font-bold text-foreground">Design. Technology. Growth.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Mission & Vision */}
      <section className="py-20 bg-background">
        <div className="container px-4 sm:px-6 lg:px-8">
          <div className="grid md:grid-cols-2 gap-8">
            <div className="p-8 rounded-2xl card-gradient border border-border">
              <h3 className="font-display text-2xl font-bold text-foreground mb-4">Our Mission</h3>
              <p className="text-muted-foreground leading-relaxed">
                To empower businesses with beautiful, functional, and results-driven digital 
                solutions. We make professional web design and digital marketing accessible 
                to businesses of all sizes, helping them compete and win in the digital age.
              </p>
            </div>
            <div className="p-8 rounded-2xl card-gradient border border-border">
              <h3 className="font-display text-2xl font-bold text-foreground mb-4">Our Vision</h3>
              <p className="text-muted-foreground leading-relaxed">
                To be the trusted digital partner for ambitious businesses worldwide. We 
                envision a world where every business, no matter how small, can have a 
                stunning digital presence that reflects their true value.
              </p>
            </div>
          </div>
        </div>
      </section>

      {/* Values */}
      <section className="py-20 bg-card">
        <div className="container px-4 sm:px-6 lg:px-8">
          <div className="text-center max-w-3xl mx-auto mb-16">
            <h2 className="font-display text-3xl sm:text-4xl font-bold text-foreground mb-4">
              Our Values
            </h2>
            <p className="text-lg text-muted-foreground">
              The principles that guide everything we do.
            </p>
          </div>

          <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            {values.map((value) => (
              <div
                key={value.title}
                className="p-6 rounded-2xl bg-background border border-border hover:border-primary/30 transition-all duration-300 text-center"
              >
                <div className="w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center mx-auto mb-4">
                  <value.icon className="w-7 h-7 text-primary" />
                </div>
                <h3 className="font-display text-lg font-semibold text-foreground mb-2">
                  {value.title}
                </h3>
                <p className="text-sm text-muted-foreground">
                  {value.description}
                </p>
              </div>
            ))}
          </div>
        </div>
      </section>
    </Layout>
  );
};

export default About;
