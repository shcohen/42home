/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   draw.c                                             :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/01/03 21:51:54 by shcohen           #+#    #+#             */
/*   Updated: 2019/01/04 22:01:21 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fractol.h"

void	mlx_pixel_put_to_image(t_all *all, int x, int y, int color)
{
	int			color1;
	int			color2;
	int			color3;
	int			bit_pix;
	float		img_size;

	img_size = all->mlx.x_size * all->mlx.y_size * all->mlx.bpp / 8;
	if (x < 0 || y < 0 || y * all->mlx.size_line
	+ x * all->mlx.bpp / 8 > img_size || x >= all->mlx.size_line /
	(all->mlx.bpp / 8) || y >= img_size / all->mlx.size_line)
		return ;
	color1 = color;
	color2 = color >> 8;
	color3 = color >> 16;
	bit_pix = all->mlx.bpp / 8;
	all->mlx.img_str[y * all->mlx.size_line + x * bit_pix] = color1;
	all->mlx.img_str[y * all->mlx.size_line + x * bit_pix + 1] = color2;
	all->mlx.img_str[y * all->mlx.size_line + x * bit_pix + 2] = color3;
}

void	ft_redraw(t_all *all)
{
	mlx_destroy_image(all->mlx.mlx_ptr, all->mlx.img_ptr);
	all->mlx.img_ptr = mlx_new_image(all->mlx.mlx_ptr, all->mlx.x_size,
	all->mlx.y_size);
	all->mlx.img_str = (int *)mlx_get_data_addr(all->mlx.img_ptr, &all->mlx.bpp,
	&all->mlx.size_line, &all->mlx.endian);
	ft_choose_fractal(all);
	mlx_put_image_to_window(all->mlx.mlx_ptr, all->mlx.win_ptr,
	all->mlx.img_ptr, 0, 0);
}

int		ft_color_choice(t_all *all)
{	
	if (all->key.color_r < 0)
		all->key.color_r = 0;
	if (all->key.color_r > 255)
		all->key.color_r = 55;
	if (all->key.color_b < 0)
		all->key.color_b = 0;
	if (all->key.color_b > 255)
		all->key.color_b = 55;
	if (all->key.color_g < 0)
		all->key.color_g = 0;
	if (all->key.color_g > 255)
		all->key.color_g = 55;
	return (((all->key.color_r & 0xFF) << 16)
	+ ((all->key.color_g & 0xFF) << 8) + (all->key.color_b & 0xFF));
}

void	ft_colors(t_all *all, int x, int y, int color)
{
	int			color1;
	int			color2;
	int			color3;
	int			bit_pix;
	float		img_size;

	img_size = all->mlx.x_size * all->mlx.y_size * all->mlx.bpp / 8;
	if (x < 0 || y < 0 || y * all->mlx.size_line
	+ x * all->mlx.bpp / 8 > img_size || x >= all->mlx.size_line /
	(all->mlx.bpp / 8) || y >= img_size / all->mlx.size_line)
		return ;
	color1 = color;
	color2 = color >> 8;
	color3 = color >> 16;
	bit_pix = all->mlx.bpp / 8;
	all->mlx.img_str[y * all->mlx.size_line + x * bit_pix] = color1;
	all->mlx.img_str[y * all->mlx.size_line + x * bit_pix + 1] = color2;
	all->mlx.img_str[y * all->mlx.size_line + x * bit_pix + 2] = color3;
}

void	ft_array(t_all *all)
{
	mlx_string_put(all->mlx.mlx_ptr, all->mlx.win_ptr, 5, 0,
			0xFFFFFF, "\n ------------------------------------ ");
	mlx_string_put(all->mlx.mlx_ptr, all->mlx.win_ptr, 5, 20,
			0xFFFFFF, "\n|  press + zoom in or - to zoom out  |");
	mlx_string_put(all->mlx.mlx_ptr, all->mlx.win_ptr, 5, 40,
			0xFFFFFF, "\n| press * to inc. or / to dec. depth |");
	mlx_string_put(all->mlx.mlx_ptr, all->mlx.win_ptr, 5, 60,
			0xFFFFFF, "\n|                                    |");
	mlx_string_put(all->mlx.mlx_ptr, all->mlx.win_ptr, 5, 80,
			0xFFFFFF, "\n|                 ^                  |");
	mlx_string_put(all->mlx.mlx_ptr, all->mlx.win_ptr, 5, 100,
			0xFFFFFF, "\n|        press  <   >  to move       |");
	mlx_string_put(all->mlx.mlx_ptr, all->mlx.win_ptr, 5, 120,
			0xFFFFFF, "\n|                 v                  |");
	mlx_string_put(all->mlx.mlx_ptr, all->mlx.win_ptr, 5, 140,
			0xFFFFFF, "\n|                                    |");
	mlx_string_put(all->mlx.mlx_ptr, all->mlx.win_ptr, 5, 160,
			0xFFFFFF, "\n|      press 'esc' to shut down      |");
	mlx_string_put(all->mlx.mlx_ptr, all->mlx.win_ptr, 5, 180,
			0xFFFFFF, "\n ------------------------------------\n\n");
}