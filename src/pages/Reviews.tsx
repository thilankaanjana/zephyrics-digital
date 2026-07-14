import { useState } from "react";
import { Layout } from "@/components/layout/Layout";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Textarea } from "@/components/ui/textarea";
import { Star, Send } from "lucide-react";
import { useToast } from "@/hooks/use-toast";
import { supabase } from "@/integrations/supabase/client";
import { z } from "zod";

const reviewSchema = z.object({
  name: z.string().trim().min(2, "Name is required").max(100),
  role: z.string().trim().max(120).optional().or(z.literal("")),
  country: z.string().trim().max(80).optional().or(z.literal("")),
  email: z.string().trim().email("Enter a valid email").max(200).optional().or(z.literal("")),
  rating: z.number().int().min(1).max(5),
  text: z.string().trim().min(20, "Please write at least 20 characters").max(1000),
});

const Reviews = () => {
  const { toast } = useToast();
  const [submitting, setSubmitting] = useState(false);
  const [rating, setRating] = useState(5);
  const [hover, setHover] = useState(0);
  const [form, setForm] = useState({
    name: "",
    role: "",
    country: "",
    email: "",
    text: "",
  });

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => {
    setForm((prev) => ({ ...prev, [e.target.name]: e.target.value }));
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    const parsed = reviewSchema.safeParse({ ...form, rating });
    if (!parsed.success) {
      toast({
        title: "Please check the form",
        description: parsed.error.issues[0]?.message ?? "Invalid input",
        variant: "destructive",
      });
      return;
    }

    setSubmitting(true);
    const { error } = await supabase.from("reviews").insert({
      name: parsed.data.name,
      role: parsed.data.role || null,
      country: parsed.data.country || null,
      email: parsed.data.email || null,
      rating: parsed.data.rating,
      text: parsed.data.text,
      status: "pending",
    });
    setSubmitting(false);

    if (error) {
      toast({
        title: "Could not submit review",
        description: error.message,
        variant: "destructive",
      });
      return;
    }

    toast({
      title: "Thank you!",
      description: "Your review was submitted and is awaiting moderation.",
    });
    setForm({ name: "", role: "", country: "", email: "", text: "" });
    setRating(5);
  };

  return (
    <Layout>
      <section className="pt-32 pb-16 bg-background relative overflow-hidden">
        <div className="absolute inset-0 hero-glow" />
        <div className="container relative z-10 px-4 sm:px-6 lg:px-8">
          <div className="max-w-3xl mx-auto text-center">
            <span className="text-primary text-sm font-semibold uppercase tracking-wider">
              Share Your Experience
            </span>
            <h1 className="font-display text-4xl sm:text-5xl md:text-6xl font-bold text-foreground mt-4 mb-6">
              Leave a <span className="gradient-text">Review</span>
            </h1>
            <p className="text-lg text-muted-foreground">
              Worked with ZephyricsStudio? We'd love to hear your feedback. Reviews are
              moderated before appearing publicly.
            </p>
          </div>
        </div>
      </section>

      <section className="pb-24 bg-background">
        <div className="container px-4 sm:px-6 lg:px-8">
          <div className="max-w-2xl mx-auto p-8 rounded-2xl card-gradient border border-border">
            <form onSubmit={handleSubmit} className="space-y-6">
              <div className="grid sm:grid-cols-2 gap-4">
                <div>
                  <label htmlFor="name" className="block text-sm font-medium text-foreground mb-2">
                    Your Name *
                  </label>
                  <Input
                    id="name"
                    name="name"
                    value={form.name}
                    onChange={handleChange}
                    placeholder="Jane Doe"
                    required
                    maxLength={100}
                    className="bg-background border-border"
                  />
                </div>
                <div>
                  <label htmlFor="role" className="block text-sm font-medium text-foreground mb-2">
                    Role / Company
                  </label>
                  <Input
                    id="role"
                    name="role"
                    value={form.role}
                    onChange={handleChange}
                    placeholder="Founder, Acme Co."
                    maxLength={120}
                    className="bg-background border-border"
                  />
                </div>
              </div>

              <div className="grid sm:grid-cols-2 gap-4">
                <div>
                  <label htmlFor="country" className="block text-sm font-medium text-foreground mb-2">
                    Country
                  </label>
                  <Input
                    id="country"
                    name="country"
                    value={form.country}
                    onChange={handleChange}
                    placeholder="United States"
                    maxLength={80}
                    className="bg-background border-border"
                  />
                </div>
                <div>
                  <label htmlFor="email" className="block text-sm font-medium text-foreground mb-2">
                    Email (private)
                  </label>
                  <Input
                    id="email"
                    name="email"
                    type="email"
                    value={form.email}
                    onChange={handleChange}
                    placeholder="you@example.com"
                    maxLength={200}
                    className="bg-background border-border"
                  />
                </div>
              </div>

              <div>
                <label className="block text-sm font-medium text-foreground mb-2">
                  Your Rating *
                </label>
                <div className="flex items-center gap-1">
                  {[1, 2, 3, 4, 5].map((n) => {
                    const active = (hover || rating) >= n;
                    return (
                      <button
                        key={n}
                        type="button"
                        onMouseEnter={() => setHover(n)}
                        onMouseLeave={() => setHover(0)}
                        onClick={() => setRating(n)}
                        aria-label={`Rate ${n} out of 5`}
                        className="p-1 focus:outline-none focus:ring-2 focus:ring-ring rounded"
                      >
                        <Star
                          className={`w-8 h-8 transition-colors ${
                            active ? "fill-primary text-primary" : "text-muted-foreground"
                          }`}
                        />
                      </button>
                    );
                  })}
                  <span className="ml-3 text-sm text-muted-foreground">{rating} / 5</span>
                </div>
              </div>

              <div>
                <label htmlFor="text" className="block text-sm font-medium text-foreground mb-2">
                  Your Review *
                </label>
                <Textarea
                  id="text"
                  name="text"
                  value={form.text}
                  onChange={handleChange}
                  placeholder="Tell us about your experience working with ZephyricsStudio..."
                  required
                  rows={6}
                  maxLength={1000}
                  className="bg-background border-border resize-none"
                />
                <p className="text-xs text-muted-foreground mt-1">
                  {form.text.length}/1000 characters
                </p>
              </div>

              <div className="p-4 rounded-xl bg-primary/5 border border-primary/20 text-sm text-muted-foreground">
                Reviews are reviewed by our team before being published. This usually takes
                less than 24 hours.
              </div>

              <Button type="submit" variant="hero" size="lg" className="w-full" disabled={submitting}>
                {submitting ? "Submitting..." : (<>Submit Review <Send className="w-4 h-4" /></>)}
              </Button>
            </form>
          </div>
        </div>
      </section>
    </Layout>
  );
};

export default Reviews;