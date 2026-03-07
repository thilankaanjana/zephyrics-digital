import { Link } from "react-router-dom";
import { ArrowRight, Sparkles } from "lucide-react";
import { Button } from "@/components/ui/button";

export function HeroSection() {
  return (
    <section className="relative min-h-screen flex items-center justify-center overflow-hidden">
      {/* Background Effects */}
      <div className="absolute inset-0 hero-glow" />
      <div className="absolute inset-0 bg-grid-pattern bg-grid opacity-5" />
      
      {/* Floating Orbs */}
      <div className="absolute top-1/4 left-1/4 w-72 h-72 bg-primary/20 rounded-full blur-[100px] animate-float" />
      <div className="absolute bottom-1/4 right-1/4 w-96 h-96 bg-primary/10 rounded-full blur-[120px] animate-float" style={{ animationDelay: "-3s" }} />
      
      <div className="container relative z-10 px-4 sm:px-6 lg:px-8 pt-24">
        <div className="max-w-4xl mx-auto text-center">
          {/* Badge */}
          <div className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 border border-primary/20 mb-8 animate-fade-up">
            <Sparkles className="w-4 h-4 text-primary" />
            <span className="text-sm font-medium text-primary">Digital Agency for Modern Brands</span>
          </div>
          
          {/* Headline */}
          <h1 className="font-display text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-foreground mb-6 animate-fade-up stagger-1 leading-tight">
            We Build Brands That
            <span className="block gradient-text">Dominate Digital</span>
          </h1>
          
          {/* Subheadline */}
          <p className="text-lg sm:text-xl text-muted-foreground max-w-2xl mx-auto mb-10 animate-fade-up stagger-2 leading-relaxed">
            Design. Technology. Growth. We help startups and businesses create stunning websites, 
            powerful brands, and scalable digital solutions that drive real results.
          </p>
          
          {/* CTA Buttons */}
          <div className="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-up stagger-3">
            <Button variant="hero" size="xl" asChild>
              <Link to="/contact" className="flex items-center gap-2">
                Get Started <ArrowRight className="w-5 h-5" />
              </Link>
            </Button>
            <Button variant="heroOutline" size="xl" asChild>
              <Link to="/portfolio">View Our Work</Link>
            </Button>
          </div>
          
          {/* Trust Indicators */}
          <div className="mt-16 pt-16 border-t border-border/50 animate-fade-up stagger-4">
            <p className="text-sm text-muted-foreground mb-6">Trusted by ambitious brands worldwide</p>
            <div className="flex flex-wrap items-center justify-center gap-8 opacity-60">
              {["TechStart", "GrowthCo", "Innovate", "BuildFast", "ScaleUp"].map((brand) => (
                <div key={brand} className="font-display font-semibold text-lg text-muted-foreground">
                  {brand}
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>
      
      {/* Bottom Gradient */}
      <div className="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-background to-transparent" />
    </section>
  );
}
